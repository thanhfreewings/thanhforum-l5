<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use App\Models\Comment;
class User extends Authenticatable
{
	protected $table = 'user';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	public function threads(){
		return $this->hasMany('App\Models\Thread','created_by','id');
	}
	public function countThread(){
		return count($this->threads);
	}

	public function userRole(){
		return $this->hasOne('App\Models\UserRole','user_id','id');
	}
	public function getRole(){
		if($this->userRole){
			return $this->userRole->role->name;
		}
		return 'User';
	}
}

