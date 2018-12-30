<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Category;
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

    public function myForum()
    {
        $forums = Forum::where('userid','like',auth()->user()->id)
            ->paginate(5);
        return view('pages.forum.myForum',compact('forums'));
    }

    public function edit($id)
    {
        $forum = Forum::where('id',$id)->get();
        $categories = Category::All();
        return view('pages.forum.edit',compact('forum','categories'));
    }

    public function editForum(Request $request,$id)
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

        Forum::where('id',$id)->update([
            'postname' => $request->name,
            'categoryid' => $request->category,
            'postdesc' => $request->desc,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        if($request->action == 'edit')
        {
            return redirect(route('editForum',['id' => $request->id]));
        }

        Forum::where('id',$request->id)
            ->update(['poststatus' => 'closed']);
        return redirect()->back();
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
