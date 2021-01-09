<?php

namespace App\Http\Controllers;

// use App\Login;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }


    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(\request(),[
            'username'=>'required',
            'password'=>'required'
        ]);

        $user = \App\User::where([
            'username'=>\request('username'),
            'password'=> \request('password'),
            'options' => \request('options')
        ])->get();

       // 'password'=> Hash::check(\request('password'), $password);

        if(count($user)) {
//            if($user[0]->email_verification) {
                auth()->login($user[0]);
//           
        } else{
            return back()->withErrors([
                'message'=>'Incorrect credentials. Please check and try again'
            ]);
        }

        //Redirect to the producer dashboard
        if($user->options=$request->input('options') == 'producer'){
            
        return redirect('/producer');
        }

        //Redirect to the transmitter dashboard
         if($user->options=$request->input('options') == 'transmitter'){
            //Redirect to the homepae
        return redirect('/transmitter');
        }

        

         //Redirect to the operator dashboard
         if($user->options=$request->input('options') == 'bulkcustomer'){
            //Redirect to the homepae
        return redirect('/bulkcustomer');
        }

            //Redirect to the operator dashboard
         if($user->options=$request->input('options') == 'operator'){
            //Redirect to the homepae
        return redirect('/operator');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();


    }
}
