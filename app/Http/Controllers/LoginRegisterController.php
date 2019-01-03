<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Auth;
use Cookie;

class LoginRegisterController extends Controller
{
   
    public function doLogin(Request $request)
    {
        $this->validate($request,[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user_data = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ];

        if(Auth::attempt($user_data)){
            if($request->rememberMe)
            {
                Cookie::queue('email',$request->email,1);
                Cookie::queue('password',$request->password,1);
            }
            
            
            return back();
        }
        else{
            return redirect()->back()->withErrors("Email or Password is incorrect");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function doRegister(Request $request)
    {
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
            'agreement'         => 'required'
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
        

        User::create([
            'username'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=>$request->birthdate,
            'address'=>$request->address,
            'image_url'=>$picture
        ]);

        // $data = new User();
        // $data->username = $request->name;
        // $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        // $data->phone = $request->phone;
        // $data->gender = $request->gender;
        // $data->dob = $request->birthdate;
        // $data->address = $request->address;
        // $data->image_url = $picture;

        // $data->save();

        return redirect(route('login'));
    }
}
