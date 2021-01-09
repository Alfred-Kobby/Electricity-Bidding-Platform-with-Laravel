<?php

namespace App\Http\Controllers;

use App\Messages;
use App\MarketOperator;
use App\BulkCustomers;
use App\PowerProducer;
use App\Transmitter;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
        $this->validate($request, [
            'from'=>'required',
            'user_type'=>'required',
            'organization'=>'required',
            'message_title' =>'required',
            'message'=>'required'
            
        ]);
       
       

        $messages = new Messages;
        $messages->to = 'operator';
        $messages->from = $request->input('from'); 
        $messages->user_type = $request->input('user_type');
        $messages->organization = $request->input('organization');
        $messages->message_title = $request->input('message_title');
        $messages->message = $request->input('message');
        $messages->save();

         return redirect()->back()->with('success', 'Message Sent'); 
    }

     public function operator_store(Request $request)
    {
        $this->validate($request, [
            'from'=>'required',
            'to'=>'required',
            'user_type'=>'required',
            'organization'=>'required',
            'message_title' =>'required',
            'message'=>'required'
            
        ]);
       
       

        $messages = new Messages;
        $messages->from = $request->input('from');
        $messages->to = $request->input('to'); 
        $messages->user_type = $request->input('user_type');
        $messages->organization = $request->input('organization');
        $messages->message_title = $request->input('message_title');
        $messages->message = $request->input('message');
        $messages->save();

         return redirect()->back()->with('success', 'Message Sent'); 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show($message_id)
    {
        $user_log=auth()->user()->username;
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Messages'];
        $data['message'] = Messages::find($message_id);
        return view('/operator/message.show', compact( 'data', 'route','powerProducer','bulkCustomer', 'transmitter', 'Operator', 'count', 'message', 'user_log_name'));
 
       
    }

    public function show_producer($message_id)
    {
        $powerProducer = PowerProducer::all();
        $user = User::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Messages'];
        $data['message'] = Messages::find($message_id);
        return view('/messages.producer_messages', compact(  'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
 
       
    }


     public function show_transmitter($message_id)
    {
        $powerProducer = PowerProducer::all();
        $user = User::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name1 = Transmitter::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =Transmitter::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Messages'];
        $data['message'] = Messages::find($message_id);
        return view('/messages.producer_messages', compact(  'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
 
       
    }


    public function show_bulkcustomer($message_id)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name1 = BulkCustomers::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =BulkCustomers::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Messages'];
        $data['message'] = Messages::find($message_id);
        return view('/messages.producer_messages', compact(  'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
