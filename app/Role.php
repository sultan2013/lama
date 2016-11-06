<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

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


// give a certain permission to a role
public function givePermission(Permission $permission){

  return $this->permissions()->attach($permission);
}// end of givePermission() method

// Revoke certain permission from a role
public function revokePermission(Permission $permission){
    return $this->permissions()->detach($permission);
}// end of revokePermission() method
}// end of the model class
