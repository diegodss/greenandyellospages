<?php

namespace App\Http\Controllers;

use View;
use Log;
use DB;
Use App\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\BusinessMedia;
use File;

class BusinessMediaController extends Controller {

    public function __construct() {

        $this->controller = "business_media";
        $this->title = "Media Files";
        $this->subtitle = "Gestion de arquivos";

        //$this->middleware('auth');
        //$this->middleware('admin');
    }

    public function index(Request $request) {

        $itemsPageRange = config('system.items_page_range');

        $itemsPage = $request->itemsPage;
        if (is_null($itemsPage)) {
            $itemsPage = config('system.items_page');
        }

        $filter = \DataFilter::source(new \App\BusinessMedia); // (BusinessMedia::with('business_media_name'));
        $filter->text('src', 'Búsqueda')->scope('freesearch');
        $filter->build();

        $grid = \DataGrid::source($filter);
        $grid->add('id_business_media', 'ID', true)->style("width:80px");
        $grid->add('business_media_name', 'BusinessMedia', true);
        $grid->add('fl_status', 'Activo')->cell(function( $value, $row ) {
            return $row->fl_status ? "Sí" : "No";
        });
        $grid->add('accion', 'Acción')->cell(function( $value, $row) {
            return $this->setActionColumn($value, $row);
        })->style("width:90px; text-align:center");
        $grid->orderBy('id_business_media', 'asc');
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

        return View::make('admin.business_media.index', $returnData);
    }

    public function create() {

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Nueva BusinessMedia";

        return View::make('admin.business_media.create', $returnData);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'business_media_name' => 'required'
        ]);

        $business_media = $request->all();
        $business_media["fl_status"] = $request->exists('fl_status') ? true : false;
        $business_media_new = BusinessMedia::create($business_media);

        $mensage_success = trans('message.saved.success');

        if ($business_media["modal"] == "sim") {
            Log::info($business_media);
            return $business_media_new; //redirect()->route('business_media.index')
        } else {/*
          return redirect()->route('business_media.index')
          ->with('success', $mensage_success); */
            return $this->edit($business_media_new->id_business_media, true);
        }
        //
    }

    public function show($id) {

        $business_media = BusinessMedia::find($id);

        $returnData['business_media'] = $business_media;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Visualizar BusinessMedia";
        return View::make('admin.business_media.show', $returnData);
    }

    public function edit($id, $show_success_message = false) {

        $business_media = BusinessMedia::find($id);

        $returnData['business_media'] = $business_media;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Editar BusinessMedia";
        $mensage_success = trans('message.saved.success');

        if (!$show_success_message) {
            return View::make('admin.business_media.edit', $returnData);
        } else {
            return View::make('admin.business_media.edit', $returnData)->withSuccess($mensage_success);
        };
    }

    public function update($id, Request $request) {

        $this->validate($request, [
            'business_media_name' => 'required'
        ]);

        $regionUpdate = $request->all();
        $regionUpdate["fl_status"] = $request->exists('fl_status') ? true : false;
        $business_media = BusinessMedia::find($id);
        $business_media->update($regionUpdate);

        $mensage_success = trans('message.saved.success');

        return $this->edit($id, true);
        /*
          return redirect()->route('business_media.index')
          ->with('success', $mensage_success); */
    }

    public function delete($id) {

        $business_media = BusinessMedia::find($id);

        $returnData['business_media'] = $business_media;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Eliminar BusinessMedia";
        return View::make('admin.business_media.delete', $returnData);
    }

    public function destroy($id) {
        $business_media = BusinessMedia::find($id);
        $file = $business_media->media_path . $business_media->media_name;
        File::delete($file);

        $business_media->delete();
        $remetente = $_SERVER['HTTP_REFERER'];
        $form_page = "business_media/delete";
        $pos = strpos($remetente, $form_page);

        if ($pos === false) {
            return "OK";
        } else {
            return redirect($this->controller);
        }
    }

    public function setActionColumn($value, $row) {

        $actionColumn = "";
        if (auth()->user()->can('userAction', $this->controller . '-index')) {
            $btnShow = "<a href='" . $this->controller . "/$row->id_business_media' class='btn btn-info btn-xs'><i class='fa fa-folder'></i></a>";
            $actionColumn .= " " . $btnShow;
        }

        if (auth()->user()->can('userAction', $this->controller . '-update')) {
            $btneditar = "<a href='" . $this->controller . "/$row->id_business_media/edit' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a>";
            $actionColumn .= " " . $btneditar;
        }

        if (auth()->user()->can('userAction', $this->controller . '-destroy')) {
            $btnDeletar = "<a href='" . $this->controller . "/delete/$row->id_business_media' class='btn btn-danger btn-xs'> <i class='fa fa-trash-o'></i></a>";
            $actionColumn .= " " . $btnDeletar;
        }
        return $actionColumn;
    }

}
