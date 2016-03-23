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
    public function countThread(){
        $count = Thread::where('created_by', '=',$this->id)
                       ->count();
        return $count;
    }
    public function getThreads(){
        $result = Thread::where('created_by', '=',$this->id)
                       ->get();
        return $result;
    }
}
