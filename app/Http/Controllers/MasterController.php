<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Auth;
use Cookie;
use Illuminate\Support\Facades\Input;

class MasterController extends Controller
{
    public function index()
    {
        return view('pages.master.home');
    }

    public function registUser(){
        return view ('pages.master.adduser');

    }

    public function addUser(Request $request){
        Validator::extend('olderThan', function($attribute, $value, $minAge)
        {
            return (Carbon::now())->diff(Carbon::parse($value))->y >= $minAge[0];
            
        });

        $validation = Validator::make($request->all(),[
            'name'              => 'required|max:255',
            'email'             => 'required|unique:users|email',
            'password'          => 'required|min:6',
            'confirmPassword'   => 'required|same:password',
            'phone'             => 'required|numeric',
            'gender'            => 'required|in:male,female',
            'birthdate'         => 'required|olderThan:12',
            'address'           => 'required|regex:/(.+)Street/i',
            'picture'           => 'required|mimes:jpeg,png,jpg',
            //'agreement'         => 'required'
        ],[
            'address.regex' => 'The :attribute must ended with \'Street\'.',
            'birthdate.older_than' => 'Minimum age is 12 years old'
        ]);

        if($validation -> fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $image = $request->file('picture');
        $picture = $image->getClientOriginalName();
        $path = 'images/';
            $image->move($path, $picture);
        //$roles = Input::only('role');
        

        User::create([
            'username'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=>$request->birthdate,
            'address'=>$request->address,
            'image_url'=>$picture
        ]);

        return redirect(route('viewMaster'));

    }
}
