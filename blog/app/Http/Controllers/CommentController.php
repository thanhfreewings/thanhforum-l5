<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{
    public function postCreate(){
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
    	$comment->thread_id = $inputs['thread_id'];
    	$comment->created_by = \Auth::user()->id;
		$comment->save();
		return redirect('/thread/view/'.$inputs['thread_id']);
    }
}
