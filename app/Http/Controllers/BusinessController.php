<?php

namespace App\Http\Controllers;

use View;
use Log;
use DB;
use File;
use Mail;
Use App\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Business;
use App\Category;
use App\Plan;
use App\BusinessCategory;
use App\BusinessContact;
use App\BusinessWorkingHour;
use App\BusinessMedia;
use App\BusinessValidity;
use App\BusinessTag;
use App\BusinessReview;
use App\BusinessPaymentMethod;

class BusinessController extends Controller {

    public function __construct() {

        $this->controller = "business";
        $this->title = "Empresas";
        $this->subtitle = "Gestion de empresas";

//$this->middleware('auth');
//$this->middleware('admin');
    }

    public function lists() {

        $business = Business::all();
        $returnData['title'] = trans('message.business'); // $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['controller'] = $this->controller;

        $returnData['business'] = $business;

        return View::make('site.business.index', $returnData);
    }

    public function index(Request $request) {

        $itemsPageRange = config('system.items_page_range');

        $itemsPage = $request->itemsPage;
        if (is_null($itemsPage)) {
            $itemsPage = config('system.items_page');
        }

        $filter = \DataFilter::source(new \App\Business); // (Business::with('business_name'));
        $filter->text('src', 'Búsqueda')->scope('freesearch');
        $filter->build();

        $grid = \DataGrid::source($filter);
        $grid->add('id_business', 'ID', true)->style("width:80px");
        $grid->add('business_name', 'Business', true);
        $grid->add('fl_status', 'Activo')->cell(function( $value, $row ) {
            return $row->fl_status ? "Sí" : "No";
        });
        $grid->add('accion', 'Acción')->cell(function( $value, $row) {
            return $this->setActionColumn($value, $row);
        })->style("width:90px; text-align:center");
        $grid->orderBy('id_business', 'asc');
        $grid->paginate($itemsPage);
        $grid->row(function ($row) {
            if ($row->cell('fl_status')->value == "No") {
                $row->style("color:#cccccc");
            }
        });

        $returnData['grid'] = $grid;
        $returnData['filter'] = $filter;
        $returnData['itemsPage'] = $itemsPage;
        $returnData['itemsPageRange'] = $itemsPageRange;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['controller'] = $this->controller;

        return View::make('admin.business.index', $returnData);
    }

    public function create($id_user) {

        $business = new Business;
        $business->id_user = $id_user;
        $returnData['business'] = $business;

        $user = User::find($id_user);
        $returnData["user"] = $user;


        $roleMenuPermiso = $role->getRoleSubMenuPermiso(null);
        $role = Role::lists('role', 'id_role');

        $auditor = array("1" => "Diego", "2" => "Pepito Perez Sanches");
        $active_directory = array("0" => "No", "1" => "Si");



        $returnData['roleMenuPermiso'] = $roleMenuPermiso;
        $returnData['role'] = $role;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Nueva Business";

        return View::make('admin.business.create', $returnData);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'business_name' => 'required'
        ]);


        $business = $request->all();
        $business["fl_status"] = $request->exists('fl_status') ? true : false;
        $business_new = Business::create($business);

        $this->save_business_validity($business->id_business);

        $mensage_success = trans('message.saved.success');

        $this->save_media($request, $business_new->id_business);

        if ($business["modal"] == "sim") {
            //Log::info($business);
            return $business_new; //redirect()->route('business.index')
        } else {/*
          return redirect()->route('business.index')
          ->with('success', $mensage_success); */
            return $this->edit($business_new->id_business, true);
        }
//
    }

    public function save_business_validity($id) {
        $validity_start = new DateTime(date('d/m/Y'));
        $validity_end = date('d/m/Y', strtotime("+6 months", strtotime($validity_end)));

        $business_validity = new BusinessValidity();
        $business_validity->id_business = $id;
        $business_validity->validity_start = $validity_start;
        $business_validity->validity_end = $validity_end;
        $business_validity->save();
    }

    public function save_business_contact($id, $request) {

        $business_contact = new BusinessContact();
        $business_contact->id_business = $id;
        $business_contact->contact_name = $request->contact_name;
        $business_contact->contact_document_type = $request->contact_document_type;
        $business_contact->contact_document = $request->contact_document;
        $business_contact->contact_phone = $request->contact_phone;
        $business_contact->save();
    }

    public function renew_business_validity($id) {

        $business_validity = BusinessValidity::where('id_business', '=', $id);
        $business_validity->fl_status = false;
        $business_validity->save();

        $this->save_business_validity($id);
    }

    public function show($id) {

        $business = Business::find($id);

        $returnData['business'] = $business;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Visualizar Business";
        return View::make('admin.business.show', $returnData);
    }

    public function edit($id, $show_success_message = false) {

        $business = Business::find($id);
        $returnData['business'] = $business;

        $user = User::find($business->id_user);
        $returnData["user"] = $user;


        $business_contact = BusinessContact::where('id_business', $id)->first();
        if (!is_object($business_contact)) {
            $business_contact = new BusinessContact();
        }
        $returnData["business_contact"] = $business_contact;


        $business_media = BusinessMedia::where('id_business', $id)->get();
        //Log::info("MEDIA");
        //Log::info($business_media);
        $returnData['business_media'] = $business_media;

        $business_working_hour = BusinessWorkingHour::where('id_business', $id)->get();
        $returnData['business_working_hour'] = $business_working_hour;

        $business_tag = BusinessTag::where('id_business', $id)->get();
        $returnData['business_tag'] = $business_tag;

        $category_s = category::active()->lists('category_name', 'id_category')->all();
        $returnData['category_s'] = $category_s;

        $business_category = $business->categories()->lists('category.id_category')->all();
        $returnData['business_category'] = $business_category;

        $plans = Plan::active()->lists('plan_name', 'id_plan')->all();
        $returnData['plans'] = $plans;


        /* init variables */
        $working_days = config("collection.working_days");
        $returnData["working_days"] = $working_days;


        $business_type_s = config("collection.business_type");
        $returnData["business_type_s"] = $business_type_s;

        $business_entity_s = config("collection.business_entity");
        $returnData["business_entity_s"] = $business_entity_s;

        $business_scale_s = config("collection.business_scale");
        $returnData["business_scale_s"] = $business_scale_s;

        $working_day_status_s = config("collection.working_day_status");
        $returnData["working_day_status_s"] = $working_day_status_s;



        /* init variables */



        $document_type_s = config("collection.document_type");
        $returnData["document_type_s"] = $document_type_s;



        /*
          $i = 0;
          //for ($i = 0; $i <= count($category); $i++) {
          foreach ($category as $id_category => $category_name) {
          $checked = false;
          if (is_array($business_category))
          $checked = in_array($id_category, $business_category);

          $i++;
          $cat_arr[$i]["name"] = $category_name;
          $cat_arr[$i]["id"] = $id_category;
          $cat_arr[$i]["test"] = $checked;
          }
          Log::info($cat_arr);
          //$allowed = $role->permissions->lists('id');
         */


        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Editar Business";
        $mensage_success = trans('message.saved.success');

        if (!$show_success_message) {
            return View::make('admin.business.edit', $returnData);
        } else {
            return View::make('admin.business.edit', $returnData)->withSuccess($mensage_success);
        };
    }

    public function save_business_media($id, $request) {

        //Log::info($request);

        if (isset($request->media)) {

            foreach ($request->media as $file) {

                if (is_object($file)) {

                    $fileName = $file->getClientOriginalName();
                    $path = base_path() . config('system.folder_business_media') . $id . '/';
                    if (!File::exists($path)) {
                        $result = File::makeDirectory($path, 0775);
                    }

                    $file->move($path, $fileName);

                    $business_media = new BusinessMedia();
                    $business_media->id_business = $id;
                    $business_media->media_name = $fileName;
                    $business_media->media_type = File::extension($fileName);
                    $business_media->media_path = $path;
                    $business_media->save();
                }
            }
        }
    }

    public function save_business_category($id, $request) {

        $business_category = BusinessCategory::where('id_business', '=', $id);
        $business_category->delete();

        $id_category_request = $request->input('category');

        foreach ($id_category_request as $id_category) {

//$id_category = $request->input('id_category_' . $i);
            $business_category = New BusinessCategory;
            $business_category->id_business = $id;
            $business_category->id_category = $id_category;
//Log::info('salvando: ' . $business_category);
            $business_category->save();
            unset($business_category);
        }
    }

    public function save_working_hour($id_business, $request) {

        $id_working_hour = $request->input('id_working_day');

        foreach ($id_working_hour as $id) {

            $business_working_hour = BusinessWorkingHour::where('id_business', $id_business)->where('working_hour_day', $id)->first();
            if (!is_object($business_working_hour)) {
                $business_working_hour = New BusinessWorkingHour;
                $business_working_hour->id_business = $id_business;
                $business_working_hour->working_hour_day = $id;
            }
            $business_working_hour->working_hour_status = $request->input('working_hour_status_' . $id);
            $business_working_hour->working_hour_time_start = $request->input('working_hour_time_start_' . $id);
            $business_working_hour->working_hour_time_end = $request->input('working_hour_time_end_' . $id);
            $business_working_hour->save();
            unset($business_working_hour);
        }
    }

    public function save_payment_method($id, $code_payment_method_request) {

//$this->save_payment_method($id, $request->input('id_payment_method'));

        foreach ($code_payment_method_request as $code_payment_method) {

            $business_payment_method = New BusinessPaymentMethod();
            $business_payment_method->id_business = $id;
            $business_payment_method->code_payment_method = $code_payment_method;
            $business_payment_method->save();
            unset($business_payment_method);
        }
    }

    public function save_business_tag($id, $request) {

        if ($request->tag != "") {
            $tags = explode(",", $request->tag);

            foreach ($tags as $tag) {

                $business_tag = New BusinessTag;
                $business_tag->id_business = $id;
                $business_tag->tag_name = $tag;
                $business_tag->save();
                unset($business_tag);
            }
        }
    }

    public function update($id, Request $request) {

        $this->validate($request, [
            'business_name' => 'required'
        ]);

        $businessUpdate = $request->all();
        $businessUpdate["fl_status"] = $request->exists('fl_status') ? true : false;
        $business = Business::find($id);
        $business->update($businessUpdate);

        $this->save_business_category($id, $request);

        $this->save_business_media($id, $request);

        $this->save_working_hour($id, $request);

        //$this->save_business_contact($id, $request);

        $this->save_business_tag($id, $request);

        $mensage_success = trans('message.saved.success');

        /*
          business_category
          business_validity
          business_working_hour
          business_media
          business_tag
          business_contact
          business_payment_method
         */
        return $this->edit($id, true);
        /*
          return redirect()->route('business.index')
          ->with('success', $mensage_success); */
    }

    public function delete($id) {

        $business = Business::find($id);

        $returnData['business'] = $business;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Eliminar Business";
        return View::make('admin.business.delete', $returnData);
    }

    public function destroy($id) {
        Business::find($id)->delete();
        return redirect($this->controller);
    }

    public function setActionColumn($value, $row) {

        $actionColumn = "";
        if (auth()->user()->can('userAction', $this->controller . '-index')) {
            $btnShow = "<a href='" . $this->controller . "/$row->id_business' class='btn btn-info btn-xs'><i class='fa fa-folder'></i></a>";
            $actionColumn .= " " . $btnShow;
        }

        if (auth()->user()->can('userAction', $this->controller . '-update')) {
            $btneditar = "<a href='" . $this->controller . "/$row->id_business/edit' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a>";
            $actionColumn .= " " . $btneditar;
        }

        if (auth()->user()->can('userAction', $this->controller . '-destroy')) {
            $btnDeletar = "<a href='" . $this->controller . "/delete/$row->id_business' class='btn btn-danger btn-xs'> <i class='fa fa-trash-o'></i></a>";
            $actionColumn .= " " . $btnDeletar;
        }
        return $actionColumn;
    }

}
