<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // relationship with permissions
public function roles(){

  return $this->belongsToMany(Role::class);

}// end of permissions() method

// give a certain permission to a role
public function assignRole(Role $role){

  return $this->roles()->attach($role);
}// end of givePermission() method

// Revoke certain permission from a role
public function revokeRole(Role $role){
    return $this->roles()->detach($role);
}// end of revokePermission() method


// add roles to a user
public function add($roles){
    if(!$this->userHasRole($roles)){
    $this->roles()->attach($roles);
}
}



//check if the user already have the role

public function userHasRole($role){
  if($this->roles()->find($role)->count() > 0){
    return true;
  }
    return false;
}

}// end of user Model
