<?php

namespace App\Http\Controllers;

use App\BulkCustomers;
use App\User;
use App\PowerDemand;
use App\PowerProducer;
use App\MarketOperator;
use App\Transmitter;
use App\MarketRules;
use App\Messages;
use Illuminate\Http\Request;

class BulkCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_log=auth()->user()->username;
        $user_id = BulkCustomers::where('p_username', $user_log)->orWhere('s_username', $user_log)->value('customer_id');
        $user_log_name1 = BulkCustomers::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =BulkCustomers::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');

        $demand1 = PowerDemand::where('customer_id', $user_id)->get();
        $demand2 = PowerDemand::where('customer_id', $user_id)->get();
        $demand3 = PowerDemand::where('customer_id', $user_id)->get();

        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();

        return view('bulkcustomer.index', compact('demand1', 'demand2', 'demand3', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
         
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
        return view('bulkcustomer.create', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message','user_log_name'));
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
           'organisation_name'=>'required',
            'email_address' =>'required',
            'country_region'=>'required',
            'postal_address'=>'required',
            'telephone_number'=>'required',
            'city'=>'required',
            'physical_location'=>'required',
            'customer_type'=>'required',

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
        //Create Bulk Customer

        $bulkcustomer = new BulkCustomers;
        $bulkcustomer->organisation_name = $request->input('organisation_name'); 
        $bulkcustomer->email_address = $request->input('email_address');
        $bulkcustomer->country_region = $request->input('country_region');
        $bulkcustomer->postal_address = $request->input('postal_address');
        $bulkcustomer->digital_address = $request->input('digital_address');
        $bulkcustomer->telephone_number = $request->input('telephone_number');
        $bulkcustomer->city = $request->input('city');
        $bulkcustomer->physical_location = $request->input('physical_location');
        $bulkcustomer->customer_type = $request->input('customer_type');
        

        //Primary Market coordinator
        $bulkcustomer->p_full_name = $request->input('p_full_name');
        $bulkcustomer->p_title = $request->input('p_title'); 
        $bulkcustomer->p_cell_phone = $request->input('p_cell_phone');
        $bulkcustomer->p_other_phone = $request->input('p_other_phone'); 
        $bulkcustomer->p_email = $request->input('p_email');
        $bulkcustomer->p_fax_number = $request->input('p_fax_number');
        $bulkcustomer->p_username = $request->input('p_username');
        $password = $request->input('p_password');
        $bulkcustomer->p_password = bcrypt($password); 

        //Secondary Market coordinator
        $bulkcustomer->s_full_name = $request->input('s_full_name');
        $bulkcustomer->s_title = $request->input('s_title'); 
        $bulkcustomer->s_cell_phone = $request->input('s_cell_phone');
        $bulkcustomer->s_other_phone = $request->input('s_other_phone'); 
        $bulkcustomer->s_email = $request->input('s_email');
        $bulkcustomer->s_fax_number = $request->input('s_fax_number');
        $bulkcustomer->s_username = $request->input('s_username');
        $bulkcustomer->s_password = $request->input('s_password');
        $bulkcustomer->save();

        //User 
        $user = new User;
        $user->username = $request->input('p_username');
        $user->password = $request->input('p_password');
        $user->options = 'bulkcustomer'; 
        $user->save();

        //User 
        $user = new User;
        $user->username = $request->input('s_username');
        $user->password = $request->input('s_password');
        $user->options = 'bulkcustomer'; 
        $user->save();

         $customer_id = BulkCustomers::pluck('customer_id')->last();

        $demand = new PowerDemand;
        $demand->customer_id = $customer_id;
        $demand->_1 = 0; 
        $demand->_2 = 0;
        $demand->_3 = 0; 
        $demand->_4 = 0; 
        $demand->_5 = 0; 
        $demand->_6 = 0; 
        $demand->_7 = 0; 
        $demand->_8 = 0; 
        $demand->_9 = 0; 
        $demand->_10 = 0; 
        $demand->_11 = 0; 
        $demand->_12 = 0; 
        $demand->_13 = 0; 
        $demand->_14 = 0;
        $demand->_15 = 0; 
        $demand->_16 = 0; 
        $demand->_17 = 0; 
        $demand->_18 = 0; 
        $demand->_19 = 0; 
        $demand->_20 = 0; 
        $demand->_21 = 0; 
        $demand->_22 = 0; 
        $demand->_23 = 0; 
        $demand->_24 = 0;  
        $demand->total_demand = 0 ;
        $demand->save();

        return redirect('/bulkcustomer/create')->with('success', 'BulkCustomer Created');         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BulkCustomers  $bulkCustomers
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $rules = MarketRules::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name1 = BulkCustomers::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =BulkCustomers::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        
        return view('bulkcustomer.show_bulkcustomer', compact('rules','powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit' ));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BulkCustomers  $bulkCustomers
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'BulkCustomer'];
        $data['bulkCustomer'] = BulkCustomers::find($customer_id);
        return view('bulkcustomer.edit', compact( 'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name' ));
    }

     public function edit_user($user_id)
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
        $route = ['name'=>'User'];
        $data['user'] = User::find($user_id);
        return view('bulkcustomer.user_edit', compact( 'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit' ));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BulkCustomers  $bulkCustomers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id)
    {
         $newData = [
        'organisation_name' => $request->organisation_name, 
        'email_address' => $request->email_address,
        'country_region'=> $request->country_region,
        'postal_address' => $request->postal_address,
        'digital_address' => $request->digital_address,
        'telephone_number' => $request->telephone_number,
        'city'=> $request->city,
        'physical_location'=> $request->physical_location,
        'customer_type'=> $request->customer_type,
        
        

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

        $bulkCustomer = BulkCustomers::find($customer_id);
        $update = $bulkCustomer->update($newData);
        
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
     * @param  \App\BulkCustomers  $bulkCustomers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bulkCustomer = BulkCustomers::find($id);
        $bulkCustomer->delete();

        session()->flash('message','Bulk Customer deleted successfully');
        return redirect('/operator');
    }
}
