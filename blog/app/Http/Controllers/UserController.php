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
        $user = User::where('id', '=', \Auth::user()->id)
                    ->first();
        return \View::make('user.edit',compact('user'));
    }
    public function postEdit()
    {
        $inputs = \Input::all();
        $rules = array(
                        'name'      =>'required',
                        'email'     =>'email|required',
                        'password'  =>'required'
                    );

        $validator = \Validator::make(\Input::all(),$rules);

        if($validator->fails()){
            return redirect('/user/edit')->withErrors($validator)->withInput();
        }

        $user = \Auth::user();
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->password = bcrypt($inputs['password']);
        $user->save();
        return redirect('/user/success');
    }
    public function success()
    {
        return \View::make('user.success');
    }
    public function postSearch()
    {
        $inputs = \Input::all();
        $users = User::where('name', '=', $inputs['name'])
                    ->get();
        return \View::make('user.search',compact('users'));
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
        if(!empty($file)){
            $name = time().'_'. $file->getClientOriginalName();
            $file->move('uploads',$name);

            $user = \Auth::user();
            $user->avatar ='uploads/'.$name;
            $user->save();
        }
        return redirect('/');
    }
}
