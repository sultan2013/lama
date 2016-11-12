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
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('permissions', 'PermissionController');

Route::post('/add_permissions_to_roles/{id}','RoleController@addPermissions');

Route::get('/add_roles_to_users',function(){
  return "here you can connect users to roles";
});
