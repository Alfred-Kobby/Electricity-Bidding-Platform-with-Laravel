<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest', ['except' => 'destroy']);
    }

  

    public function store()
    {
    	//Attempt to authenticate the user and sign in, if not return back

    	$this->validate(\request(),[
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = \App\User::where([
            'email'=>\request('email'),
            'password'=> \request('password')
        ])->get();

//        'password'=> Hash::check(\request('password'), $hashedPassword)

        if(count($user)) {
//            if($user[0]->email_verification) {
                auth()->login($user[0]);
//            } else {
//                return redirect('/verify')->with(['errormessage'=>'Please verify your email to login',
//                    'userId'=>$user[0]->id
//                ]);
//            }
        } else{
            return back()->withErrors([
                'message'=>'Incorrect credentials. Please check and try again'
            ]);
        }

    	//Redirect to the homepae
    	return redirect()->home();
    }

    public function destroy()
    {
    	Auth::logout();

    	return redirect()->home();
    }
}
