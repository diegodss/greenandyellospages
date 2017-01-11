<?php

namespace App\Http\Controllers;

use View;
use Log;
use DB;
Use App\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller {

    public function __construct() {

        $this->controller = "category";
        $this->title = "Categorias";
        $this->subtitle = "Gestion de categorias";

        //$this->middleware('auth');
        //$this->middleware('admin');
    }

    public function lists() {

        $category = Category::all();
        $returnData['title'] = trans('message.category'); // $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['controller'] = $this->controller;

        $returnData['category'] = $category;

        return View::make('site.category.index', $returnData);
    }

    public function index(Request $request) {

        $itemsPageRange = config('system.items_page_range');

        $itemsPage = $request->itemsPage;
        if (is_null($itemsPage)) {
            $itemsPage = config('system.items_page');
        }

        $filter = \DataFilter::source(new \App\Category); // (Category::with('category_name'));
        $filter->text('src', 'Búsqueda')->scope('freesearch');
        $filter->build();

        $grid = \DataGrid::source($filter);
        $grid->add('id_category', 'ID', true)->style("width:80px");
        $grid->add('category_name', 'Category', true);
        $grid->add('fl_status', 'Activo')->cell(function( $value, $row ) {
            return $row->fl_status ? "Sí" : "No";
        });
        $grid->add('accion', 'Acción')->cell(function( $value, $row) {
            return $this->setActionColumn($value, $row);
        })->style("width:90px; text-align:center");
        $grid->orderBy('id_category', 'asc');
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

        return View::make('admin.category.index', $returnData);
    }

    public function create() {

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Nueva Category";

        return View::make('admin.category.create', $returnData);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $category = $request->all();
        $category["fl_status"] = $request->exists('fl_status') ? true : false;
        $category_new = Category::create($category);

        $mensage_success = trans('message.saved.success');

        if ($category["modal"] == "sim") {
            Log::info($category);
            return $category_new; //redirect()->route('category.index')
        } else {/*
          return redirect()->route('category.index')
          ->with('success', $mensage_success); */
            return $this->edit($category_new->id_category, true);
        }
        //
    }

    public function show($id) {

        $category = Category::find($id);

        $returnData['category'] = $category;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Visualizar Category";
        return View::make('admin.category.show', $returnData);
    }

    public function edit($id, $show_success_message = false) {

        $category = Category::find($id);

        $returnData['category'] = $category;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Editar Category";
        $mensage_success = trans('message.saved.success');

        if (!$show_success_message) {
            return View::make('admin.category.edit', $returnData);
        } else {
            return View::make('admin.category.edit', $returnData)->withSuccess($mensage_success);
        };
    }

    public function update($id, Request $request) {

        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $regionUpdate = $request->all();
        $regionUpdate["fl_status"] = $request->exists('fl_status') ? true : false;
        $category = Category::find($id);
        $category->update($regionUpdate);

        $mensage_success = trans('message.saved.success');

        return $this->edit($id, true);
        /*
          return redirect()->route('category.index')
          ->with('success', $mensage_success); */
    }

    public function delete($id) {

        $category = Category::find($id);

        $returnData['category'] = $category;

        $returnData['title'] = $this->title;
        $returnData['subtitle'] = $this->subtitle;
        $returnData['titleBox'] = "Eliminar Category";
        return View::make('admin.category.delete', $returnData);
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect($this->controller);
    }

    public function setActionColumn($value, $row) {

        $actionColumn = "";
        if (auth()->user()->can('userAction', $this->controller . '-index')) {
            $btnShow = "<a href='" . $this->controller . "/$row->id_category' class='btn btn-info btn-xs'><i class='fa fa-folder'></i></a>";
            $actionColumn .= " " . $btnShow;
        }

        if (auth()->user()->can('userAction', $this->controller . '-update')) {
            $btneditar = "<a href='" . $this->controller . "/$row->id_category/edit' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a>";
            $actionColumn .= " " . $btneditar;
        }

        if (auth()->user()->can('userAction', $this->controller . '-destroy')) {
            $btnDeletar = "<a href='" . $this->controller . "/delete/$row->id_category' class='btn btn-danger btn-xs'> <i class='fa fa-trash-o'></i></a>";
            $actionColumn .= " " . $btnDeletar;
        }
        return $actionColumn;
    }

}
