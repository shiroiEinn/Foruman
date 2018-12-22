<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function login()
    {
        session(['nav' => 'login']);
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }
}
