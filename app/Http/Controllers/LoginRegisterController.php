<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Auth;

class LoginRegisterController extends Controller
{
   
    public function doLogin(Request $request)
    {
        $this->validate($request,[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user_data = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect(route('home'));
        }
        else{
            return back()
                ->with('error', 'Email or Password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view(route('home'));
    }

    public function doRegister(Request  $request)
    {
        Validator::extend('olderThan', function($attribute, $value, $minAge)
        {
            return (Carbon::now())->diff(Carbon::parse($value))->y >= $minAge;

        });

        $this->validate($request,[
            'name'              => 'required|max:255',
            'email'             => 'required|unique:users|email',
            'password'          => 'required|min:6',
            'confirmPassword'   => 'required|same:password',
            'phone'             => 'required|numeric',
            'gender'            => 'required|in:male,female',
            'birthdate'         => 'olderThan:12',
            'address'           => 'required|regex:/(.+)Street/i'
        ],[
            'address.regex' => 'The :attribute must ended with \'Street\'.',
            'birthdate.older_than' => 'Minimum age is 12 years old'
        ]);

        return redirect(route('register'));
    }
}
