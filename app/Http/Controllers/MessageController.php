<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('userid',auth()->user()->id)->paginate(10);
        return view('pages.profile.inbox',compact('messages'));
    }

    public function addMessage(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'message' => 'required'
        ]);

        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation);
        }

        Message::create([
            'userid'    => $request->id,
            'senderid'  => auth()->user()->id,
            'message'   => $request->message
        ]);

        return redirect()->back()->with('success','Your message has been submitted');
    }

    public function deleteMessage(Request $request)
    {
        $message = Message::where('id',$request->id);
        $message->delete();
        return redirect()->back();
    }
}
