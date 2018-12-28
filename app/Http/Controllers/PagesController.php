<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $forums = Forum::paginate(5);
        return view('pages.home', compact('forums'));
    }

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function addForum()
    {
        $categories = Category::All();
        return view('pages.forum.add',compact('categories'));
    }
}
