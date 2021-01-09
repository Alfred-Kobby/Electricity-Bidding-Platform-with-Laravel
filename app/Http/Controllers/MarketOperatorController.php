<?php

namespace App\Http\Controllers;


use App\MarketOperator;
use App\User;
use App\PowerDemand;
use App\BulkCustomers;
use App\PowerProducer;
use App\Transmitter;
use App\Messages;
use App\MarketRules;
use Illuminate\Http\Request;

class MarketOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    


    public function index()
    {
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $demand1 = PowerDemand::where('customer_id', '1')->get();
        $demand2 = PowerDemand::where('customer_id', '2')->get();
        $demand3 = PowerDemand::where('customer_id', '3')->get();
        $count = Messages::where('from', $user_log_name)->count();

    


        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
 

        return view('operator.index', compact('demand1', 'demand2', 'demand3','powerProducer','bulkCustomer', 'transmitter', 'Operator', 'count', 'message','user_log_name'));
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
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $transmitter = Transmitter::all();
        $Operator = MarketOperator::all();
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
 
        return view('operator.create', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message','user_log_name'));
        
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
            'transmitter_name'=>'required',
            'mailing_address' =>'required',
            'contact_address'=>'required',
            'control_location'=>'required',
            'phone_contact_1'=>'required', 
            'full_name'=>'required',
            'title'=>'required',
            'cell_phone'=>'required',
            'email'=>'required',
            'fax_number'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        //Create Operator
        $operator = new MarketOperator;
        $operator->transmitter_name = $request->input('transmitter_name'); 
        $operator->mailing_address = $request->input('mailing_address');
        $operator->contact_address = $request->input('contact_address');
        $operator->controL_location = $request->input('controL_location');
        $operator->phone_contact_1 = $request->input('phone_contact_1');
        $operator->phone_contact_2 = $request->input('phone_contact_2');
        $operator->city = $request->input('city');
        $operator->full_name = $request->input('full_name');
        $operator->title = $request->input('title'); 
        $operator->cell_phone = $request->input('cell_phone');
        $operator->other_phone = $request->input('other_phone'); 
        $operator->email = $request->input('email');
        $operator->fax_number = $request->input('fax_number');
        $operator->username = $request->input('username');
        $operator->password = $request->input('password'); 
        $operator->save();

        //User 
        $user = new User;
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->options = 'operator'; 
        $user->save();

        return redirect('/operator/create')->with('success', 'Operator Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarketOperator  $marketOperator
     * @return \Illuminate\Http\Response
     */
    public function show(MarketOperator $marketOperator)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $rules = MarketRules::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        return view('operator.show_operator', compact('rules', 'data', 'route','powerProducer','bulkCustomer', 'transmitter', 'Operator', 'count', 'message', 'user_log_name' ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarketOperator  $marketOperator
     * @return \Illuminate\Http\Response
     */
    public function edit($operator_id)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'MarketOperator'];
        $data['operator'] = MarketOperator::find($operator_id);
        return view('operator.edit', compact( 'data', 'route','powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarketOperator  $marketOperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $operator_id)
    {
         $newData = [
        'transmitter_name' => $request->transmitter_name, 
        'mailing_address' => $request->mailing_address,
        'contact_address' => $request->contact_address,
        'center_location' => $request->center_location,
        'phone_contact_1'=> $request->phone_contact_1,
        'phone_contact_2'=> $request->phone_contact_2,
        'full_name' => $request->full_name,
        'title' => $request->title, 
        'cell_phone' => $request->cell_phone,
        'other_phone' => $request->other_phone, 
        'email' => $request->email,
        'fax_number' => $request->fax_number,
        'username' => $request->username,
        'password' => $request->password, 
        ];

        $operator = MarketOperator::find($operator_id);
        $update = $operator->update($newData);


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
     * @param  \App\MarketOperator  $marketOperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketOperator $marketOperator)
    {
        //
    }
}
