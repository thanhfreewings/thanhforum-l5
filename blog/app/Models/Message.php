<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;
class Message extends Model
{
	protected $table = 'message';

	public function inbox(){
		return Message::find($this->created_by);
	}
	public function getSender(){
		return User::find($this->created_by);
	}
	public function getReceiver(){
		return User::find($this->receiver_id);
	}
    public static function countInbox()
    {
    	$user = \Auth::user();
        $messages = Message::where('receiver_id', '=', $user->id)
        				->count();
        return $messages;
    }
}