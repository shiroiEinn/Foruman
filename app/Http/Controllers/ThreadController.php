<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Thread;
use Illuminate\Http\Request;
use Validator;

class ThreadController extends Controller
{
    public function index($id)
    {
        $forumid = $id;
        $forum = Forum::where('id',$id)->get();
        $threads = Thread::wherehas('forum',function($query) use($forumid){
            $query->where('id',$forumid);
        })->paginate(5);
        return view('pages.forum.thread', compact('forum','threads'));
    }

    public function search(Request $request)
    {
        return redirect(route('viewThread'));
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'content'      => 'required'
        ]);
        
        if($validation -> fails()) {
            return redirect()->back()->withErrors($validation);
        }
        
        Thread::create([
            'userid' => auth()->user()->id,
            'forumid' => $request->forumid,
            'thread' => $request->content
        ]);


        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if($request->action == 'edit')
        {
            return redirect(route('editThread',['id' => $request->id]));
        }
        $thread = Thread::where('id',$request->id);
        $thread->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $thread = Thread::where('id',$id)->get();

        return view('pages.forum.editThread',compact('thread'));
    }

    public function editThread(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'content'   => 'required'
        ]);

        if($validation -> fails())
        {
            return redirect()->back()->withErrors($validation);
        }

        Thread::where('id',$id)->update([
            'thread'    => $request->content
        ]);

        return redirect(route('viewThread',['id' => $id]));
    }
}
