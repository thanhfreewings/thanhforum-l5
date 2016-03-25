<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
	
	public function inbox()
	{
		$user = \Auth::user();
		$messages = Message::where('receiver_id', '=', $user->id)
						->orderBy('id', 'desc')
						->get();
		return \View::make('message.inbox',compact('messages'));
	}
	public function sent()
	{
		$user = \Auth::user();
		$messages = Message::where('created_by', '=', $user->id)
						->orderBy('id', 'desc')
						->get();
		return \View::make('message.sent',compact('messages'));
	}
	public function getCreate(){
		$getUsers = User::all();
		return \View::make('message.create',compact('getUsers'));
	}
	public function postCreate(){
		$inputs = \Input::all();
		$message = new Message();
		$message->message = $inputs['message'];
		$message->receiver_id = $inputs['receiver_id'];
		$message->created_by = \Auth::user()->id;
		$message->save();
		return redirect('/message/sent');
	}
	public function getReply($id){
		$getUser = User::find($id);
		return \View::make('message.reply',compact('getUser'));
	}
	public function inboxDelete($id){
		Message::where('id', '=', $id)->delete();
		return redirect('/message/inbox');
	}
	public function sentDelete($id){
		Message::where('id', '=', $id)->delete();
		return redirect('/message/sent');
	}
}