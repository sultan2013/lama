<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Role;
use App\Permission;
use App\User;
class RoleController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */

protected $id;
protected $model;
protected $request;
protected $test;

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





    //////////////////////////////////////////
    public function show($id){
      $role = Role::findOrFail($id);
      $all_permissions = Permission::all();
      $related_permissions = $role->permissions()->get();
      return view('roles.show',compact('role','all_permissions','related_permissions'));
    }


public function addPermissions($id, Request $request){

$role = Role::findOrFail($id);
 $permission = $request->permissions;
 //$permissions = Permission::findOrFail($permission);
 //return $permissions;
 if ($role->givePermission($permission)){
  //return $request->permissions;
  flash('The permissions has been added to the role successfully', 'success');
  return back();
}
flash('The permissions has not been added to the role ', 'warning');
return back();
}




public function removePermissions($role_id, $permission_id){

  $role = Role::findOrFail($role_id);
  $role->revokePermission($permission_id);
  flash('This role does not have these permissions any more', 'success');

  return back();

}


public function assignRoles($id, Request $request){
$user = User::findOrFail($id);
$roles = $request->data;
$this->setValues($user,$roles);
return $this->manyToManyRelations($this->model,$this->request);
}// end of assignRoles method


public function setValues($model,$request){
 $this->model = $model;
 $this->request = $request;
}



public function manyToManyRelations($model,$request){

   if ($model->add($request)){
  //return $request->permissions;
  flash('The roles have been added to the user successfully', 'success');
  return back();
}
flash('The roles have not been added to the user ', 'warning');
return back();

}


public function testTrait(){
  
  //return "not yet";
  return $this->test();
}

    public function destroy($id){

      $role = Role::findOrFail($id);
      if($role->hasPermissions()){
        $role->permissions()->detach();
        $role->delete($id);
        flash('The role has been deleted successfully', 'success');
        return back();
      }
  $role->delete($id);
  return back();
    }
}
