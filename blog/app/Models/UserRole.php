<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id','role_id'];

    public function role(){
    	return $this->belongsTo('App\Models\Role','role_id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    }
}
