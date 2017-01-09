<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
// ----------------------- Route::auth(); ----------------------------
// vendor\laravel\framework\src\Illuminate\Routing
// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// este bloque esta aca para desactivar las rutas para register
//Route::get('register', 'Auth\AuthController@showRegistrationForm');
//Route::post('register', 'Auth\AuthController@register');
// Password Reset Routes...

Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//--------------------------Fin de  Route::auth(); --------------------------

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');

    Route::resource('/usuario', 'UsuarioController');
    Route::get('/usuario/delete/{id}', 'UsuarioController@delete');

    Route::resource('/role', 'RoleController');
    Route::get('/role/delete/{id}', 'RoleController@delete');
    Route::get('/role/get/json/', 'RoleController@ajaxRole');

    Route::resource('/menu', 'MenuController');
    Route::get('/menu/delete/{id}', 'MenuController@delete');	

    Route::resource('/comuna', 'ComunaController');
    Route::get('/comuna/delete/{id}', 'ComunaController@delete');
    Route::get('/comuna/get/json/', 'ComunaController@ajaxComuna');

    Route::resource('/region', 'RegionController');
    Route::get('/region/delete/{id}', 'RegionController@delete');

	/* 
	Ejemplo para usar ajax: add y grid
    Route::get('/controller/get/relacion/{id_}', 'Controller@gridAjaxRelacion');
    Route::get('/controller/add/relacion/{id_}/{id_relacion}', 'Controller@storeRelacion');
	*/	
});

