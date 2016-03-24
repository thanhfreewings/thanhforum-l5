<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comment extends Model
{
    protected $table = 'post';
    
    public function getUser(){
        return User::find($this->created_by);
    }
}