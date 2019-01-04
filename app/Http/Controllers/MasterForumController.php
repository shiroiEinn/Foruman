<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class MasterForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();

        return view('pages.master.masterforum',compact('forums'));
    }

    public function closeDelete(Request $request,$id)
    {
        if($request->action == 'close')
        {
            Forum::where('id',$id)
                ->update([
                    'poststatus' => 'close'
                ]);

        }
        else if($request->action == 'delete')
        {
            $forum = Forum::where('id',$id);
            $forum->delete();
        }

        return redirect()->back();
    }
}
