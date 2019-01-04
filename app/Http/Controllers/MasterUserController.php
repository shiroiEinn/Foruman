<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Validator;
use File;
use Carbon\Carbon;

class MasterUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.master.masteruser',compact('users'));
    }

    public function editDelete(Request $request)
    {
        if($request->action == 'edit')
        {
            return redirect(route('editUserMaster',['id'=>$request->id]));
        }

        $user = User::where('id',$request->id);
        $user->delete();

        return redirect()->back();
    }

    public function editUser($id)
    {
        $user = User::where('id',$id)->get();
        $roles = Role::all();

        return view('pages.master.editmasteruser',compact('user','roles'));
    }

    public function doEditUser(Request $request,$id)
    {
        Validator::extend('olderThan', function($attribute, $value, $minAge)
        {
            return (Carbon::now())->diff(Carbon::parse($value))->y >= $minAge[0];
            
        });

        $validation = Validator::make($request->all(),[
            'name'              => 'required|max:255',
            'role'              => 'required',
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
        
        $user = User::where('id',$id)->get();

        File::delete(public_path().'/images/'.$user[0]->image_url);
        $image = $request->file('picture');
        $picture = $image->getClientOriginalName();
        $path = 'images/';
            $image->move($path, $picture);
        
        

        User::where('id',$id)->update([
            'username'  =>$request->name,
            'email'     =>$request->email,
            'password'  =>bcrypt($request->password),
            'phone'     =>$request->phone,
            'gender'    =>$request->gender,
            'dob'       =>$request->birthdate,
            'address'   =>$request->address,
            'image_url' =>$picture
        ]);

        return redirect(route('viewUserMaster'));
    }


    public function addUserMaster(){

        $roles = Role::all();
        return view ('pages.master.addmasteruser',compact('roles'));

    }

    public function create(Request $request){
        Validator::extend('olderThan', function($attribute, $value, $minAge)
        {
            return (Carbon::now())->diff(Carbon::parse($value))->y >= $minAge[0];
            
        });

        $validation = Validator::make($request->all(),[
            'name'              => 'required|max:255',
            'role'              => 'required',
            'email'             => 'required|unique:users|email',
            'password'          => 'required|min:6',
            'confirmPassword'   => 'required|same:password',
            'phone'             => 'required|numeric',
            'gender'            => 'required|in:male,female',
            'birthdate'         => 'required|olderThan:12',
            'address'           => 'required|regex:/(.+)Street/i',
            'picture'           => 'required|mimes:jpeg,png,jpg',
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
            'roleid'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=>$request->birthdate,
            'address'=>$request->address,
            'image_url'=>$picture
        ]);

        return redirect(route('viewUserMaster'));

    }
}
