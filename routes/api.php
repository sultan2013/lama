<?php

use Illuminate\Http\Request;
use App\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// only to test api calls and array_map()
Route::get('/roles', function (){
  $roles = Role::all()->toArray();
  return array_map(function(array $roles){
    return [
      'role' =>$roles['name'],
      'title'=>$roles['label']
    ];

  },$roles);


});
