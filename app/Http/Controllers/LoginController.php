<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function checkLogin(request $request){
        $this->validate($request, 
       ['email'    => 'required|email',
        'password' => 'required'
       ]);

       $user_data = array(
           'email' => $request->get('email'),
           'password' => $request->get('password')
       );

       if(Auth::attempt($user_data)){
            return redirect('home/successlogin');

       }

       else{
        return back()->with('error', 'Wrong Login Details');

       }

       function successLogin(){
           return view('profile');
       }

       function logout(){
           Auth::logout();
           return redirect('login');
       }

    }
}
