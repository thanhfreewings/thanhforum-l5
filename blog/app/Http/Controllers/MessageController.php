<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    
    public function index()
    {
        $messages = Message::all();
        return \View::make('message.index',compact('messages'));
    }
}
