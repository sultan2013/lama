<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Role;
class RoleController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }


// index method
    public function index(){
     $text_alignment = "text-right";
     $roles = (new Role)->get();
      return view('roles.index',compact('roles','text_alignment'));
    }



// create new role form page
public function create(){
 $roles = (new Role)->get();
  return view('roles.create',compact('roles'));
}

// save new role to the database
    public function store(CreateRoleRequest $request){

      $role = Role::create($request->all());
      flash('The role has been created successfully', 'success');
      return back();
    }
// edit a certain role form method
    public function edit($id){
      $_role = Role::findOrFail($id);
      $roles = Role::all();
      return view('roles.edit',compact('_role','roles'));
    }
    public function update($id ,UpdateRoleRequest $request){

     $role = Role::findOrFail($id);
     //if the entered values are the same as the database value don't edit
     if($role->name == $request->name && $role->label == $request->label)
     {
       flash('There is nothing to edit', 'warning');
       return back();

     }
     $role->update($request->all());
     flash('The role has been updated successfully', 'success');
     return redirect('roles/create');

    }
    public function show($id){
      $role = Role::findOrFail($id);
      return view('roles.show',compact('role'));
    }
    public function destroy($id){

      $role = Role::findOrFail($id);
      $role->delete($id);
      flash('The role has been deleted successfully', 'success');
      return redirect('roles/create');
    }
}
