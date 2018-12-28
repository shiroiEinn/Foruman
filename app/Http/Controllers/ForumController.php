<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;
use Validator;  
use Carbon\Carbon;

class ForumController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'      => 'required',
            'category'  => 'required'
        ],[
            'category.required' => ':attribute must be selected'
        ]);

        if($validation -> fails()) {
            return redirect()->back()->withErrors($validation);
        }
        
        Forum::create([
            'userid' => auth()->user()->id,
            'postname' => $request->name,
            'categoryid' => $request->category,
            'postdesc' => $request->desc
        ]);


        return redirect(route('home'));
    }

    public function update(Request $request, Forum $forum)
    {
        //
    }

    public function destroy(Forum $forum)
    {
        //
    }

    public function search(Request $request){
        $search = $request->get('name');
        $forums = Forum::where('postname','like','%'.$search.'%')
                        ->orwherehas('category', function ($query) use($search){
                            $query->where('categoryname','like','%'.$search.'%');
                        })->paginate(5);
        $forums->appends($request->only('name'));
        
        return view('pages.home', compact('forums'));
    }
}
