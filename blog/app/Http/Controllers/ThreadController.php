<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thread;

class ThreadController extends Controller
{
    
    public function index()
    {
        $threads = Thread::all();
        return \View::make('thread.index',compact('threads'));
    }

    public function view($id){
        $thread = Thread::find($id);
        return \View::make('thread.view',compact('thread'));
    }
}
