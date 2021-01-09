<?php

namespace App\Http\Controllers;

use App\Actual_PowerDemands;
use App\PowerDemand;
use App\User;
use App\BulkCustomers;
use App\Transmitter;
use App\Messages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActualPowerDemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_log=auth()->user()->username;
        $user_edit = User::where('username', $user_log)->value('id');
        $user_log_name1 = BulkCustomers::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =BulkCustomers::Where('s_username', $user_log)->value('s_full_name');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();

        return view('actual_demand.create', compact('user_log_name1','user_log_name2','user_edit', 'count', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            '_1'=>'required',
            '_2'=>'required',
            '_3'=>'required',
            '_4'=>'required',
            '_5'=>'required',
            '_6'=>'required',
            '_7'=>'required',
            '_8'=>'required',
            '_9'=>'required',
            '_10'=>'required',
            '_11'=>'required',
            '_12'=>'required',
            '_13'=>'required',
            '_14'=>'required',
            '_15'=>'required',
            '_16'=>'required',
            '_17'=>'required',
            '_18'=>'required',
            '_19'=>'required',
            '_20'=>'required',
            '_21'=>'required',
            '_22'=>'required',
            '_23'=>'required',
            '_24'=>'required'
        ]);
        //Create demand

        $cus_id = BulkCustomers::where('p_username', $request->input('name'))->orWhere('s_username', $request->input('name'))->value('customer_id');

        $time = Carbon::today()->toDateString();

        $compare = Actual_PowerDemands::Where('created_at', 'like', $time.'%')->Where('customer_id', $cus_id)->count();
        
        if($compare)
        {
           return redirect('/actual_demand/create')->with('error', 'Actual Power Demand has already been submitted'); 
        }
       
       
        $demand = new Actual_PowerDemands;
        $demand->customer_id = $cus_id;
        $demand->_1 = $request->input('_1'); 
        $demand->_2 = $request->input('_2');
        $demand->_3 = $request->input('_3'); 
        $demand->_4 = $request->input('_4'); 
        $demand->_5 = $request->input('_5'); 
        $demand->_6 = $request->input('_6'); 
        $demand->_7 = $request->input('_7'); 
        $demand->_8 = $request->input('_8'); 
        $demand->_9 = $request->input('_9'); 
        $demand->_10 = $request->input('_10'); 
        $demand->_11 = $request->input('_11'); 
        $demand->_12 = $request->input('_12'); 
        $demand->_13 = $request->input('_13'); 
        $demand->_14 = $request->input('_14');
        $demand->_15 = $request->input('_15'); 
        $demand->_16 = $request->input('_16'); 
        $demand->_17 = $request->input('_17'); 
        $demand->_18 = $request->input('_18'); 
        $demand->_19 = $request->input('_19'); 
        $demand->_20 = $request->input('_20'); 
        $demand->_21 = $request->input('_21'); 
        $demand->_22 = $request->input('_22'); 
        $demand->_23 = $request->input('_23'); 
        $demand->_24 = $request->input('_24');  
        $demand->total_actual_demand = $demand->_1 + $demand->_2 + $demand->_3 + $demand->_4 + $demand->_5 + $demand->_6 +
                                $demand->_7 + $demand->_8 + $demand->_9 + $demand->_10 + $demand->_11 + $demand->_12 +
                                $demand->_13 + $demand->_14 + $demand->_15 + $demand->_16 + $demand->_17 + $demand->_18 +
                                $demand->_19 + $demand->_20 + $demand->_21 + $demand->_22 + $demand->_23 + $demand->_24 ;
        $demand->save();

         return redirect('/actual_demand/create')->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actual_PowerDemands  $actual_PowerDemands
     * @return \Illuminate\Http\Response
     */
    public function show(Actual_PowerDemands $actual_PowerDemands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actual_PowerDemands  $actual_PowerDemands
     * @return \Illuminate\Http\Response
     */
    public function edit(Actual_PowerDemands $actual_PowerDemands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actual_PowerDemands  $actual_PowerDemands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actual_PowerDemands $actual_PowerDemands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actual_PowerDemands  $actual_PowerDemands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actual_PowerDemands $actual_PowerDemands)
    {
        //
    }
}
