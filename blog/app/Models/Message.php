<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;
class Message extends Model
{
	protected $table = 'message';

	public function getSender()
	{
		return $this->belongsTo('App\Models\User','created_by','id');
	}
	public function getReceiver(){
		return $this->belongsTo('App\Models\User','receiver_id','id');
	}
    public static function countInbox()
    {
    	$user = \Auth::user();
        $messages = Message::where('receiver_id', '=', $user->id)
        				->count();
        return $messages;
    }
}