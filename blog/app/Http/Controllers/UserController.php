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
    public function create()
    {
        return \View::make('user.create');
    }
    public function view($id){
        $user = User::find($id);
        return \View::make('user.view',compact('user'));
    }
}
