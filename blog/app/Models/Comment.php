<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comment extends Model
{
    protected $table = 'post';
    
    public function user(){
    	return $this->belongsTo('App\Models\User','created_by','id');
    }
}