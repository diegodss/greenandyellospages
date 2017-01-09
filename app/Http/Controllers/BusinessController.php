<?php

namespace App\Http\Controllers;

use View;
use Log;
use DB;
Use App\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Business;

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
        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['controller'] = $this->controller;

        $returnData['business'] = trans('message.business'); //$business;


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

    public function create() {

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
        $region_new = Business::create($business);

        $mensage_success = trans('message.saved.success');

        if ($business["modal"] == "sim") {
            Log::info($business);
            return $region_new; //redirect()->route('business.index')
        } else {/*
          return redirect()->route('business.index')
          ->with('success', $mensage_success); */
            return $this->edit($region_new->id_business, true);
        }
        //
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

    public function update($id, Request $request) {

        $this->validate($request, [
            'business_name' => 'required'
        ]);

        $regionUpdate = $request->all();
        $regionUpdate["fl_status"] = $request->exists('fl_status') ? true : false;
        $business = Business::find($id);
        $business->update($regionUpdate);

        $mensage_success = trans('message.saved.success');

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
