<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Comment;

class ThreadController extends Controller
{
    
    public function index()
    {
        $threads = Thread::join('user', 'thread.created_by', '=', 'user.id')
        			->select('thread.*',
        					 'user.id as userId',
        					 'user.name',
        					 'user.avatar')
        			->orderBy('thread.id', 'desc')
					->get();
        return \View::make('thread.index',compact('threads'));
    }

    public function getView($id){
        $thread = Thread::find($id);
        return \View::make('thread.view',compact('thread'));
    }
    public function postComment(){
    	$inputs = \Input::all();
        $rules = array(
                        'content'  =>'required'
                    );

        $validator = \Validator::make(\Input::all(),$rules);

        if($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
        }

    	$comment = new Comment();
    	$comment->content = $inputs['content'];
    	$comment->created_by = \Auth::user()->id;
		$comment->save();
		return redirect('/thread/view/'.$inputs['']);
    }
    public function getCreate(){
    	return \View::make('thread.create');
    }

    public function postCreate(){
    	$inputs = \Input::all();

        $rules = array(
                        'title'    =>'required|min:4|max:50',
                        'content'  =>'required'
                    );

        $validator = \Validator::make(\Input::all(),$rules);

        if($validator->fails()){
            return redirect('/thread/create')->withErrors($validator)->withInput();
        }

    	$thread = new Thread();
    	$thread->title = $inputs['title'];
    	$thread->content = $inputs['content'];
    	$thread->created_at = time();
    	$thread->created_by = \Auth::user()->id;
		$thread->save();
		return redirect('/');
    }
    public function created(){
    	$threads = Thread::where('created_by', '=', \Auth::user()->id)
    					->get();
    	return \View::make('thread.created',compact('threads'));
    }
}
