<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Comment;

class Thread extends Model
{
    protected $table = 'thread';

    public function comments(){
        return $this->hasMany('App\Models\Comment','thread_id','id')
                    ->orderBy('id','desc');
    }
    public function getUser(){
        return $this->belongsTo('App\Models\User','created_by','id');
    }   
    public function filterUser(){
        $result = array();
        $users = array();
        
        $comments = $this->comments;

        foreach ($comments as $comment) {
            $users[] = $comment->user;
        }

        foreach ($users as $user){
            $found = false;
            foreach ($result as $value) {
                if($value->id == $user->id){
                    $found = true;
                    break;
                }
            }
            if(!$found){
                $result[] = $user;
            }
        }
        return $result;
    }
    
    public function countComment(){
        return count($this->comments);
    }

}
