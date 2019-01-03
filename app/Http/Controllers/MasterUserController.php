<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.master.masteruser',compact('users'));
    }

    public function editDelete(Request $request)
    {
        if($request->action == 'edit')
        {
            return redirect(route('home'));
        }

        $user = User::where('id',$request->id);
        $user->delete();

        return redirect()->back();
    }
}
