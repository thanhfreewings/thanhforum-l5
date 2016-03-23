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
    public function getComments(){
        $result = Comment::where('thread_id', '=',$this->id)
                       ->get();
        return $result;
    }
    public function countComment(){
        $count = Comment::where('thread_id', '=',$this->id)
                       ->count();
        return $count;
    }
    public function getRecentUserReplies(){
        $result = User::where('id', '=',$this->id)
                       ->get();
        return $result;
    }
}
