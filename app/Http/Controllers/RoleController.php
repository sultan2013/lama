<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
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
      flash('The role has been created successfully', 'success');
      return back();
    }
// edit a certain role form method
    public function edit($id){
      $_role = Role::findOrFail($id);
      $roles = Role::all();
      return view('roles.edit',compact('_role','roles'));
    }
    public function update($id ,CreateRoleRequest $request){

     $role = Role::findOrFail($id);
     $role->update($request->all());
     flash('The role has been updated successfully', 'success');
     return redirect('roles/create');

    }
    public function show($id){
      return 'show method';
    }
    public function destroy($id){

      $role = Role::findOrFail($id);
      $role->delete($id);
      flash('The role has been deleted successfully', 'success');
      return redirect('roles/create');
    }
}
