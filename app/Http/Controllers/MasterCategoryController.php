<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;

class MasterCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.master.mastercategory',compact('categories'));
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'  => 'required'
        ]);

        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation);
        }

        Category::create([
            'categoryname' => $request->name
        ]);

        return redirect()->back()->with('Success','The new category is submitted');
    }

    public function editDeleteCategory(Request $request)
    {
        if($request->action == 'edit')
        {
            return redirect(route('editCategoryMaster',['id'=>$request->id]));
        }
        else
        {
            $category = Category::where('id',$request->id);
            $category->delete();

            return redirect()->back();
        }
    }

    public function editCategory($id)
    {
        $category = Category::where('id',$id)->get();
        return view('pages.master.editmastercategory',compact('category'));
    }

    public function doEditCategory(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'name'  => 'required'
        ]);

        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation);
        }

        Category::where('id',$id)->update([
            'categoryname' => $request->name
        ]);

        return redirect(route('viewCategoryMaster'));
    }
}
