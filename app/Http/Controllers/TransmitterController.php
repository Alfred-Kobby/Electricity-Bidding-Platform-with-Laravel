<?php

namespace App\Http\Controllers;

use App\Transmitter;
use App\User;
use App\PowerDemand;
use App\Unit_Avaliable;
use App\PowerProducer;
use App\MarketOperator;
use App\BulkCustomers;
use App\MarketRules;
use App\Messages;
use Illuminate\Http\Request;

class TransmitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_log=auth()->user()->username;
        $user_log_name1 = Transmitter::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =Transmitter::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $demand1 = Unit_Avaliable::where('corridor', 'Eastern')->get();
        $demand2 = Unit_Avaliable::where('corridor', 'Western')->get();
        $demand3 = Unit_Avaliable::where('corridor', 'Northern')->get();
        // $demand = Unit_Avaliable::where('corridor', 'Northern')->pluck('tot');
        


        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
 

        return view('transmitter.index', compact('demand1', 'demand2', 'demand3','powerProducer','bulkCustomer', 'transmitter', 'Operator', 'count', 'message','user_log_name1', 'user_log_name2', 'user_edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
         return view('transmitter.create', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name'));
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
            //General information
            'transmitter_name'=>'required',
            'email_address' =>'required',
            'postal_address'=>'required',
            'phone_contact'=>'required',
            'location_of_control_center'=>'required',
            
            

            //Technical information
            'total_num_of_transmission_lines'=>'required',
            'total_cap_of_transmission_lines'=>'required',
            'transmission_voltage_level_required'=>'required',
            'transmission_frequency_level_required'=>'required',

            //financial information
            'transmission_charge'=>'required',
            


            //Primary Market coordinator
            'p_full_name'=>'required',
            'p_title'=>'required',
            'p_cell_phone'=>'required',
            'p_email'=>'required|email',
            'p_fax_number'=>'required',
            'p_username'=>'required',
            'p_password'=>'required',

             //Secondary Market coordinator
            's_full_name'=>'required',
            's_title'=>'required',
            's_cell_phone'=>'required',
            's_email'=>'required|email',
            's_fax_number'=>'required',
            's_username'=>'required',
            's_password'=>'required'
            
        ]);
        //Create Producer
        $transmitter = new Transmitter;

        //General Information
        $transmitter->transmitter_name = $request->input('transmitter_name'); 
        $transmitter->email_address = $request->input('email_address');
        $transmitter->postal_address = $request->input('postal_address');
        $transmitter->digital_address = $request->input('digital_address');
        $transmitter->phone_contact = $request->input('phone_contact');
        $transmitter->location_of_control_center = $request->input('location_of_control_center');
        
        
        //Technical Information
        $transmitter->total_num_of_transmission_lines = $request->input('total_num_of_transmission_lines');
        $transmitter->total_cap_of_transmission_lines = $request->input('total_cap_of_transmission_lines');
        $transmitter->transmission_voltage_level_required = $request->input('transmission_voltage_level_required');
        $transmitter->transmission_frequency_level_required = $request->input('transmission_frequency_level_required');

         //financial Information
        $transmitter->transmission_charge = $request->input('transmission_charge');
        
        //Primary Market coordinator
        $transmitter->p_full_name = $request->input('p_full_name');
        $transmitter->p_title = $request->input('p_title'); 
        $transmitter->p_cell_phone = $request->input('p_cell_phone');
        $transmitter->p_other_phone = $request->input('p_other_phone'); 
        $transmitter->p_email = $request->input('p_email');
        $transmitter->p_fax_number = $request->input('p_fax_number');
        $transmitter->p_username = $request->input('p_username');
        $transmitter->p_password = $request->input('p_password'); 

        //Secondary Market coordinator
        $transmitter->s_full_name = $request->input('s_full_name');
        $transmitter->s_title = $request->input('s_title'); 
        $transmitter->s_cell_phone = $request->input('s_cell_phone');
        $transmitter->s_other_phone = $request->input('s_other_phone'); 
        $transmitter->s_email = $request->input('s_email');
        $transmitter->s_fax_number = $request->input('s_fax_number');
        $transmitter->s_username = $request->input('s_username');
        $transmitter->s_password = $request->input('s_password'); 
        
        $transmitter->save();
       

        //User 
        $user = new User;
        $user->username = $request->input('p_username');
        $user->password = $request->input('p_password');
        $user->options = 'transmitter'; 
        $user->save();

        //User 
        $user = new User;
        $user->username = $request->input('s_username');
        $user->password = $request->input('s_password');
        $user->options = 'transmitter'; 
        $user->save();

        return redirect('/transmitter/create')->with('success', 'New Power Transmitter Created');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transmitter  $transmitter
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $powerProducer = PowerProducer::all();
        $user = User::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $rules = MarketRules::all();
        $user_log=auth()->user()->username;
        $user_log_name1 = Transmitter::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 = Transmitter::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        return view('transmitter.show_transmitter', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'rules', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transmitter  $transmitter
     * @return \Illuminate\Http\Response
     */
    public function edit($transmitter_id)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Transmitter'];
        $data['transmitter'] = Transmitter::find($transmitter_id);
        return view('transmitter.edit', compact( 'data', 'route', 'powerProducer', 'transmitter', 'bulkCustomer','Operator', 'count', 'message', 'user_log_name' ));
    }

     public function edit_user($user_id)
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
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'User'];
        $data['user'] = User::find($user_id);
        return view('transmitter.user_edit', compact( 'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transmitter  $transmitter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transmitter_id)
    {
        $newData = [
         //General Infromation
        'transmitter_name' => $request->transmitter_name, 
        'email_address' => $request->email_address,
        'postal_address' => $request->postal_address,
        'digital_address' => $request->digital_address,
        'phone_contact' => $request->phone_contact,
        'location_of_control_center'=> $request->location_of_control_center,
        

        //Technical Information
        'total_num_of_transmission_lines' => $request->total_num_of_transmission_lines,
        'total_cap_of_transmission_lines' => $request->total_cap_of_transmission_lines,
        'transmission_voltage_level_required' => $request->transmission_voltage_level_required,
        'transmission_frequency_level_required' => $request->transmission_frequency_level_required,

        //financial info

        'transmission_charge' => $request->transmission_charge,


        //Market coordinator
        'p_full_name' => $request->p_full_name,
        'p_title' => $request->p_title, 
        'p_cell_phone' => $request->p_cell_phone,
        'p_other_phone' => $request->p_other_phone, 
        'p_email' => $request->p_email,
        'p_fax_number' => $request->p_fax_number,
        'p_username' => $request->p_username,
        'p_password' => $request->p_password,

        //Market coordinator
        's_full_name' => $request->s_full_name,
        's_title' => $request->s_title, 
        's_cell_phone' => $request->s_cell_phone,
        's_other_phone' => $request->s_other_phone, 
        's_email' => $request->s_email,
        's_fax_number' => $request->s_fax_number,
        's_username' => $request->s_username,
        's_password' => $request->s_password, 
        
        ];


        $transmitter = Transmitter::find($transmitter_id);    
        $update = $transmitter->update($newData);
        
    
        if($update)
        {
           
            return redirect()->back()->with('success', 'Record Update Successful');  
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function update_user(Request $request, $user_id)
    {
         $newData = [
        
        'username' => $request->username,
        'password' => $request->password, 
        ];

        $user = User::find($user_id);
        $update = $user->update($newData);


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
     * @param  \App\Transmitter  $transmitter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transmitter $transmitter)
    {
        //
    }
}
