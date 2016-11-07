<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Role;
class RoleController extends Controller
{
    //


// index method
    public function index(){

     $roles = (new Role)->get();
      return view('roles.index',compact('roles'));
    }



// create new role form page
public function create(){
 $roles = (new Role)->get();
  return view('roles.create',compact('roles'));
}

// save new role to the database
    public function store(CreateRoleRequest $request){

      $role = Role::create($request->all());
      return back();
    }
// edit a certain role form method
    public function edit($id){
      return "edit form";
    }
    public function update(Request $request){
      return "udate method";
    }
    public function show($id){
      return 'show method';
    }
    public function destroy($id){
      return 'delete method';
    }
}
