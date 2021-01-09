<?php

namespace App\Http\Controllers;

use App\MarketRules;
use App\MarketOperator;
use App\User;
use App\PowerDemand;
use App\BulkCustomers;
use App\PowerProducer;
use App\Transmitter;
use App\Messages;
use Illuminate\Http\Request;

class MarketRulesController extends Controller
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
        $operator_id =  MarketOperator::where('username', $user_log)->value('operator_id');
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $transmitter = Transmitter::all();
        $Operator = MarketOperator::all();
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
 
        return view('market_rules.create', compact('powerProducer','bulkCustomer', 'transmitter', 'Operator', 'operator_id', 'count', 'message','user_log_name'));
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
            'reference_num'=>'required',
            'title' =>'required',
            'description'=>'required',
            
        ]);

        //Create MarketRule
        $rule = new MarketRules;
        $rule->operator_id = $request->input('operator_id'); 
        $rule->reference_num = $request->input('reference_num');
        $rule->title = $request->input('title');
        $rule->description = $request->input('description');
         
        $rule->save();

        return redirect('/market_rules/create')->with('success', 'New Market Rule Added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarketRules  $marketRules
     * @return \Illuminate\Http\Response
     */
    public function show(MarketRules $marketRules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarketRules  $marketRules
     * @return \Illuminate\Http\Response
     */
    public function edit($rule_id)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $market_rules = MarketRules::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $operator_id =  MarketOperator::where('username', $user_log)->value('operator_id');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'MarketRules'];
        $data['market_rules'] = MarketRules::find($rule_id);
        return view('market_rules.edit', compact( 'data', 'route','powerProducer', 'operator_id', 'transmitter', 'bulkCustomer','Operator', 'count', 'message', 'user_log_name' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarketRules  $marketRules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rule_id)
    {
        $newData = [
        'operator_id' => $request->operator_id, 
        'reference_num' => $request->reference_num,
        'title' => $request->title,
        'description' => $request->description,
       
         
        ];

        $rule = MarketRules::find($rule_id);
        $update = $rule->update($newData);


        if($update)
        {
           
            return redirect()->back()->with('success', 'Record Update Successful');  
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarketRules  $marketRules
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketRules $marketRules)
    {
        //
    }
}
