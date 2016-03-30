<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Comment;

class Thread extends Model
{
    protected $table = 'thread';

    public function getUser(){
        return User::find($this->created_by);
    }
    public function filterUser(){
        $result = array();
        $users = array();
        
        $comments = $this->getComments();
        foreach ($comments as $comment) {
            $users[] = $comment->getUser();
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
    public function getComments(){
        $result = Comment::where('thread_id', '=',$this->id)
                        ->orderBy('id', 'desc')
                        ->get();
        return $result;
    }
    public function countComment(){
        $count = Comment::where('thread_id', '=',$this->id)
                       ->count();
        return $count;
    }

}
