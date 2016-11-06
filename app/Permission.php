<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
class Permission extends Model
{
    //
    protected $fillable = [
        'name', 'label',
    ];

    // relationship with roles
public function roles(){

  return $this->belongsToMany(Role::class);

}// end of permissions() method



}// end of Permission Model
