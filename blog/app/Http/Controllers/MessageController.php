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
        $rules = array(
                        'message'      =>'required|min:4|max:100'
                    );

        $validator = \Validator::make(\Input::all(),$rules);

        if($validator->fails()){
            return redirect('/message/create')->withErrors($validator)->withInput();
        }
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
	public function postReply(){
		$inputs = \Input::all();
        $rules = array(
                        'message'      =>'required|min:4|max:100'
                    );

        $validator = \Validator::make(\Input::all(),$rules);

        if($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
            //return redirect('/message/reply/'.$inputs['receiver_id'])->withErrors($validator)->withInput();
        }
		$message = new Message();
		$message->message = $inputs['message'];
		$message->receiver_id = $inputs['receiver_id'];
		$message->created_by = \Auth::user()->id;
		$message->save();
		return redirect('/message/sent');
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