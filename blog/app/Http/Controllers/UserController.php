<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return \View::make('user.index',compact('users'));
    }
/*    public function create()
    {
        return \View::make('user.create');
    }*/
    public function getEdit()
    {
        $user = User::where('id', '=', \Auth::user()->id);
        return \View::make('user.edit',compact('user'));
    }
    public function view($id)
    {
        $user = User::find($id);
        return \View::make('user.view',compact('user'));
    }
    public function upload()
    {
        return \View::make('user.upload');
    }
    public function postUpload()
    {
        $file = \Input::file('avatar');
        $name = time().'_'. $file->getClientOriginalName();
        $file->move('uploads',$name);

        $user = \Auth::user();
        $user->avatar ='uploads/'.$name;
        $user->save();
        return redirect('/');
    }
}
