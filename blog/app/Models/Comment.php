<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'post';
    
    public function getUser(){
        return User::find($this->created_by);
    }
}