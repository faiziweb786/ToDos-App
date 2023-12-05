<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function messageStore(Request $req) {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $message = New Message;
        $message->name = $req['name'];
        $message->email = $req['email'];
        $message->subject = $req['subject'];
        $message->message = $req['message'];
        $message->save();
        return redirect()->route('contact-us')->with('success' , 'Your Message Successfully Send!');
    }
}
