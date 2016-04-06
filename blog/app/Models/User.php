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

	public function getRole($id){
		$userRole = UserRole::where('user_id','=', $id)
						->first();
		if(!empty($userRole)){
			$role = Role::where('id','=',$userRole->role_id)
						->first();
			return $role->name;
		}else{
			return 'N/A';
		}
	}
}

