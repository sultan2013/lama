<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\User;

class Role extends Model
{
    //
    protected $fillable = [
        'name', 'label',
    ];



    // relationship with permissions
public function permissions(){

  return $this->belongsToMany(Permission::class);

}// end of permissions() method


//relationship with users
public function users(){
  return $this->belongsToMany(User::class);
}//end of users() method

// give a certain permission to a role
public function givePermission($permission){
if (!$this->roleHasPermission($permission)){
  return $this->permissions()->attach($permission);
}
}// end of givePermission() method

// Revoke certain permission from a role
public function revokePermission($permission){
    if($this->roleHasPermission($permission)){
    return $this->permissions()->detach($permission);
  }
}// end of revokePermission() method



// antother method to check permission
public function roleHasPermission($permission){
  if($this->permissions()->find($permission)->count() > 0 ){
    return true;
  }
  return false;
}


// check if the role has permission associated with it
public function hasPermissions(){
  if($this->permissions()->count() > 0){
    return true;
  }
  return false;
}


// asign role to a given user 

public function assignToUserRole($role, User $user){

   if(!$this->userHasRole($role)){
  $user->roles->attach($role);
}
}




}// end of the model class
