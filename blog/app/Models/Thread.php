<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class Thread extends Model
{
	protected $table = 'thread';

	public function comments(){
		return $this->hasMany('App\Models\Comment','thread_id','id')
					->orderBy('id','desc');
	}
	public function countComment(){
		return count($this->comments);
	}
	public function likes(){
		return $this->hasMany('App\Models\Like','thread_id','id')
					->orderBy('id','desc');
	}
	public function getLike(){
		$likes = Like::where('thread_id', $this->id)
					->where('created_by', \Auth::user()->id)
					->get();
		foreach($likes as $value){
			return true;
		}
		return false;
	}
	public function countLikes(){
		return count($this->likes);
	}
	public function user(){
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
	

}
