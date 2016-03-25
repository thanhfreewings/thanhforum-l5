<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thread;

class ThreadController extends Controller
{
    
    public function index()
    {
        $threads = Thread::orderBy('id', 'desc')
					->get();
        return \View::make('thread.index',compact('threads'));
    }

    public function view($id){
        $thread = Thread::find($id);
        return \View::make('thread.view',compact('thread'));
    }

    public function getCreate(){
    	return \View::make('thread.create');
    }

    public function postCreate(){
    	$inputs = \Input::all();
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
