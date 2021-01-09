<?php

namespace App\Http\Controllers;

use App\PowerProducer;
use App\User;
use App\Unit_Avaliable;
use App\MarketOperator;
use App\BulkCustomers;
use App\Transmitter;
use App\MarketRules;
use App\Messages;
use Illuminate\Http\Request;

class PowerProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_log=auth()->user()->username;
        $user_id = PowerProducer::where('p_username', $user_log)->orWhere('s_username', $user_log)->value('producer_id');
        $user_org = PowerProducer::where('p_username', $user_log)->orWhere('s_username', $user_log)->value('organisation_name');
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');



        $demand1 = Unit_Avaliable::where('producer_id', $user_id)->get();
        $demand2 = Unit_Avaliable::where('producer_id', $user_id)->get();
        $demand3 = Unit_Avaliable::where('producer_id', $user_id)->get();
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
       

    
        return view('producer.index', compact('demand1', 'demand2', 'demand3', 'count', 'message', 'user_log_name1', 'user_log_name2','user_edit'));
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
         return view('producer.create', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name'));
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
            'organisation_name'=>'required',
            'email_address' =>'required',
            'postal_address'=>'required',
            'telephone_number'=>'required',
            'city'=>'required',
            'physical_location'=>'required',
            

            //Technical information
            'total_min_installed_capacity'=>'required',
            'total_max_installed_capacity'=>'required',
            'total_cap_of_transmission_lines'=>'required',
            'total_len_of_transmission_lines'=>'required',
            'gen_source'=>'required',


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
        $producer = new PowerProducer;

        //General Information
        $producer->organisation_name = $request->input('organisation_name'); 
        $producer->email_address = $request->input('email_address');
        $producer->postal_address = $request->input('postal_address');
        $producer->digital_address = $request->input('digital_address');
        $producer->telephone_number = $request->input('telephone_number');
        $producer->city = $request->input('city');
        $producer->physical_location = $request->input('physical_location');
        
        

        //Technical Information
        $producer->total_min_installed_capacity = $request->input('total_min_installed_capacity');
        $producer->total_max_installed_capacity = $request->input('total_max_installed_capacity');
        $producer->total_cap_of_transmission_lines = $request->input('total_cap_of_transmission_lines');
        $producer->total_len_of_transmission_lines = $request->input('total_len_of_transmission_lines');
        $producer->gen_source = $request->input('gen_source');


        //Primary Market coordinator
        $producer->p_full_name = $request->input('p_full_name');
        $producer->p_title = $request->input('p_title'); 
        $producer->p_cell_phone = $request->input('p_cell_phone');
        $producer->p_other_phone = $request->input('p_other_phone'); 
        $producer->p_email = $request->input('p_email');
        $producer->p_fax_number = $request->input('p_fax_number');
        $producer->p_username = $request->input('p_username');
        $producer->p_password = $request->input('p_password'); 

        //Secondary Market coordinator
        $producer->s_full_name = $request->input('s_full_name');
        $producer->s_title = $request->input('s_title'); 
        $producer->s_cell_phone = $request->input('s_cell_phone');
        $producer->s_other_phone = $request->input('s_other_phone'); 
        $producer->s_email = $request->input('s_email');
        $producer->s_fax_number = $request->input('s_fax_number');
        $producer->s_username = $request->input('s_username');
        $producer->s_password = $request->input('s_password'); 
        
        $producer->save();
       

        //User 
        $user = new User;
        $user->username = $request->input('p_username');
        $user->password = $request->input('p_password');
        $user->options = 'producer'; 
        $user->save();

        //User 
        $user = new User;
        $user->username = $request->input('s_username');
        $user->password = $request->input('s_password');
        $user->options = 'producer'; 
        $user->save();

        $producer_id = PowerProducer::pluck('producer_id')->last();

        //unit avaliable
        $unit_avaliable = new Unit_Avaliable;
        $unit_avaliable->producer_id = $producer_id;
        $unit_avaliable->_1 = 0; 
        $unit_avaliable->_2 = 0;
        $unit_avaliable->_3 = 0; 
        $unit_avaliable->_4 = 0; 
        $unit_avaliable->_5 = 0; 
        $unit_avaliable->_6 = 0; 
        $unit_avaliable->_7 = 0; 
        $unit_avaliable->_8 = 0; 
        $unit_avaliable->_9 = 0; 
        $unit_avaliable->_10 = 0; 
        $unit_avaliable->_11 = 0; 
        $unit_avaliable->_12 = 0; 
        $unit_avaliable->_13 = 0; 
        $unit_avaliable->_14 = 0;
        $unit_avaliable->_15 = 0; 
        $unit_avaliable->_16 = 0; 
        $unit_avaliable->_17 = 0; 
        $unit_avaliable->_18 = 0; 
        $unit_avaliable->_19 = 0; 
        $unit_avaliable->_20 = 0; 
        $unit_avaliable->_21 = 0; 
        $unit_avaliable->_22 = 0; 
        $unit_avaliable->_23 = 0; 
        $unit_avaliable->_24 = 0;  
        $unit_avaliable->total_capacity = 0 ;
        $unit_avaliable->save();


        return redirect('/producer/create')->with('success', 'Producer Created');         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PowerProducer  $powerProducer
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
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        return view('producer.show_producer', compact('powerProducer','bulkCustomer','Operator', 'transmitter', 'rules', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PowerProducer  $powerProducer
     * @return \Illuminate\Http\Response
     */
    public function edit($producer_id)
    {

        $powerProducer = PowerProducer::all();
        $bulkCustomer = BulkCustomers::all();
        $Operator = MarketOperator::all();
        $transmitter = Transmitter::all();
        $user_log=auth()->user()->username;
        $user_log_name = MarketOperator::where('username', $user_log)->value('full_name');
        $count = Messages::where('to', 'operator')->count();
        $message = Messages::where('to', 'operator') ->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'PowerProducer'];
        $data['powerProducer'] = PowerProducer::find($producer_id);
        return view('producer.edit', compact( 'data', 'route', 'powerProducer', 'transmitter', 'bulkCustomer','Operator', 'count', 'message', 'user_log_name' ));
    }

     public function edit_user($user_id)
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
        $route = ['name'=>'User'];
        $data['user'] = User::find($user_id);
        return view('producer.user_edit', compact( 'data', 'route', 'powerProducer','bulkCustomer','Operator', 'transmitter', 'count', 'message', 'user_log_name1', 'user_log_name2', 'user_edit'));
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
     * @param  \App\PowerProducer  $powerProducer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producer_id)
    {
         $newData = [
         //General Infromation
        'organisation_name' => $request->organisation_name, 
        'email_address' => $request->email_address,
        'postal_address' => $request->postal_address,
        'digital_address' => $request->digital_address,
        'telephone_number' => $request->telephone_number,
        'city'=> $request->city,
        'physical_location' => $request->physical_location,
        
        

        //Technical Information
        'total_min_installed_capacity' => $request->total_min_installed_capacity,
        'total_max_installed_capacity' => $request->total_max_installed_capacity,
        'total_cap_of_transmission_lines' => $request->total_cap_of_transmission_lines,
        'total_len_of_transmission_lines' => $request->total_len_of_transmission_lines,
        'gen_source' => $request->gen_source,


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


        $powerProducer = PowerProducer::find($producer_id);    
        $update = $powerProducer->update($newData);
        
    
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
     * @param  \App\PowerProducer  $powerProducer
     * @return \Illuminate\Http\Response
     */
    public function destroy($producer_id)
    {
        $powerProducer = PowerProducer::find($producer_id);
        $powerProducer->delete();

        session()->flash('message','Power Producer deleted successfully');
        return redirect('/operator');
    }
}
