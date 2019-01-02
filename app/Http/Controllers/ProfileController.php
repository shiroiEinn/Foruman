<?php

namespace App\Http\Controllers;

use App\User;
use App\Popularity;
use Illuminate\Http\Request;
use File;
use Validator;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index($id = null)
    {   
        if(!$id)
        {
            $id = auth()->user()->id;
        }
        $userid = $id;
        $popularity = Popularity::whereHas('user',function($query) use($userid){
            $query->where('userid',$userid);
        })->where('senderid',auth()->user()->id)->get();

        $upvote = Popularity::where('popularity','=','1')
                ->where('userid',$userid)->get()->count();
        
        $downvote = Popularity::where('popularity','=','-1')
                ->where('userid',$userid)->get()->count();
        
        $counter = [
            'upvote' => $upvote,
            'downvote' => $downvote
        ];
        
        $user = User::where('id',$id)->get();
        return view('pages.profile.profile', compact('user','popularity','counter'));
    }

    public function edit()
    {
        $user = User::where('id',auth()->user()->id)->get();
        return view('pages.profile.editProfile',compact('user'));
    }

    public function editProfile(Request $request)
    {
        Validator::extend('olderThan', function($attribute, $value, $minAge)
        {
            return (Carbon::now())->diff(Carbon::parse($value))->y >= $minAge[0];
            
        });

        $validation = Validator::make($request->all(),[
            'name'              => 'required|max:255',
            'email'             => 'required|email',
            'password'          => 'required|min:6',
            'confirmPassword'   => 'required|same:password',
            'phone'             => 'required|numeric',
            'gender'            => 'required|in:male,female',
            'birthdate'         => 'required|olderThan:12',
            'address'           => 'required|regex:/(.+)Street/i',
            'picture'           => 'required|mimes:jpeg,png,jpg'
        ],[
            'address.regex' => 'The :attribute must ended with \'Street\'.',
            'birthdate.older_than' => 'Minimum age is 12 years old'
        ]);

        if($validation -> fails())
        {
            return redirect()->back()->withErrors($validation);
        }
        
        File::delete(public_path().'/images/'.auth()->user()->image_url);
        $image = $request->file('picture');
        $picture = $image->getClientOriginalName();
        $path = 'images/';
            $image->move($path, $picture);
        
        

        User::where('id',auth()->user()->id)->update([
            'username'  =>$request->name,
            'email'     =>$request->email,
            'password'  =>bcrypt($request->password),
            'phone'     =>$request->phone,
            'gender'    =>$request->gender,
            'dob'       =>$request->birthdate,
            'address'   =>$request->address,
            'image_url' =>$picture
        ]);

        return redirect(route('viewProfile'));
    }

    public function popularity(Request $request,$id)
    {
        $key = [
            "positive" => 1,
            "negative" => -1,
            "positive-s" => 0,
            "negative-s" => 0
        ];
        $userid = $id;
        $popularity = Popularity::whereHas('user',function($query) use($userid){
            $query->where('userid',$userid);
        })->where('senderid',auth()->user()->id)->get();
        if($popularity->isEmpty())
        {
            Popularity::create([
                'userid' => $id,
                'senderid' => auth()->user()->id,
                'popularity' => $key[$request->action]
            ]);
        }
        else 
        {
            Popularity::where('userid',$userid)->update([
                'popularity' => $key[$request->action]
            ]);
        }

        return redirect()->back();
    }

}
