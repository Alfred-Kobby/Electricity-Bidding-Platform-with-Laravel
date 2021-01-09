<?php

namespace App\Http\Controllers;

use App\optimizer;
use App\MarketOperator;
use App\Transmitter;
use App\User;
use App\PowerDemand;
use App\BulkCustomers;
use App\PowerProducer;
use App\Messages;
use App\Bid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OptimizerController extends Controller
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
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $bid = Bid::pluck('producer_id');
    
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all(); 
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' ASC')->get();
        
        return view('optimizer.create', compact('powerProducer','bulkCustomer', 'transmitter', 'Operator', 'count', 'message', 'user_log_name'));
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
            
            'reserved_cap'=>'required',
             
        ]);

        $time = Carbon::today()->toDateString();

        $compare = optimizer::Where('created_at', 'like', $time.'%')->count();
        
        if($compare)
        {
           return redirect('/optimizer/create')->with('error', 'Reserved Capacity has already been submitted'); 
        }

        //Create optimizer
        $optimizer = new optimizer;

         $optimizer->reserved_cap = $request->input('reserved_cap'); 
         $optimizer->save();
         return redirect('/optimizer/create')->with('success', 'Succesfully submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\optimizer  $optimizer
     * @return \Illuminate\Http\Response
     */
    public function show(optimizer $optimizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\optimizer  $optimizer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'optimizer'];
        $data['operator'] = optimizer::pluck('reserved_cap')->last();
        var_dump($data);
        die();
        return view('optimizer.edit', compact( 'data', 'route','powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\optimizer  $optimizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, optimizer $optimizer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\optimizer  $optimizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(optimizer $optimizer)
    {
        //
    }
}
