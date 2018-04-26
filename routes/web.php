<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
	Route::get('/admin/inicio', 'HomeController@index')->name('inicio');
	Route::get('/admin/ofimatica/ver', 'OfimaticaController@index')->name('ofimatica');
	// mapa de la planta
	Route::get('/admin/mapa', 'MapaController@index')->name('mapa');
	Route::get('/admin/mapa/get', 'MapaController@getZonas');
	// rutas para el personal
	Route::get('/admin/talento/personal', 'PersonaController@index')->name('personal');
	Route::get('/admin/talento/personal/get', 'PersonaController@getPersonas');
	// rutas de los cargos
	Route::get('/admin/talento/cargos', 'CargoController@index')->name('cargos');
	Route::get('/admin/talento/cargos/get', 'CargoController@getCargos');
	// rutas de los roles y permisos
	Route::get('/admin/roles', 'RolesController@index')->name('roles');
	Route::get('/admin/roles/get', 'RolesController@getRoles');
	Route::post('/admin/roles/delete', 'RolesController@deleteRol');
	Route::post('/admin/roles/permisos/get', 'RolesController@getPermissionsByRole');
	Route::post('/admin/roles/permisos/set', 'RolesController@setPermissionsByRole');
	Route::get('/admin/permisos/get', 'RolesController@getPermisos');
	// rutas para la gestion de usuarios
	Route::get('/admin/usuarios', 'UserController@index')->name('users');
	Route::get('/admin/usuarios/get', 'UserController@getUsers');
	Route::post('/admin/usuarios/add', 'UserController@addUser');
	Route::post('/admin/usuarios/update', 'UserController@update');
	Route::get('/admin/usuarios/get/user', 'UserController@getUser');
	Route::post('/admin/usuarios/delete', 'UserController@deleteUser');

	\TalvBansal\MediaManager\Routes\MediaRoutes::get();
});
