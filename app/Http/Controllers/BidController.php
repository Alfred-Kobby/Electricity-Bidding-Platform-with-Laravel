<?php

namespace App\Http\Controllers;

use App\Bid;
use App\User;
use App\PowerProducer;
use App\Messages;
use App\Unit_Avaliable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BidController extends Controller
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
        $time = Carbon::now();
        $minTime = Carbon::today()->addHours(6);
        $maxTime = Carbon::today()->addHours(24);
        $user_log=auth()->user()->username;
        $user_id = PowerProducer::where('p_username', $user_log)->orWhere('s_username', $user_log)->value('producer_id');
        $bid_id = Bid::where('producer_id', $user_id)->value('id');
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        if($time->greaterThanOrEqualTo($minTime) && $time->lessThanOrEqualTo($maxTime)){

         return view('bid.create', compact('count', 'bid_id', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     } else {
                $bid_time = $minTime->diffForHumans($time);
                $bid_time_left = $minTime->diff($time)->format('%H : %I : %S');
                return view('bid.page404', compact('count', 'bid_time', 'bid_time_left', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     }
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
            'dependable_cap' =>'required',
            'voltage_level_of_supply'=>'required',
            'duration_of_supply'=>'required',
            'frequency_of_supply'=>'required',
            'available_factor'=>'required',

            'price_of_energy'=>'required',
            'capacity_charge'=>'required'


        ]);


        $producer_id = PowerProducer::where('p_username', $request->input('name'))->orWhere('s_username', $request->input('name'))->value('producer_id');
        $corridor = PowerProducer::where('p_username', $request->input('name'))->orWhere('s_username', $request->input('name'))->value('corridor');
        $time = Carbon::today()->toDateString();

        $compare = Bid::Where('created_at', 'like', $time.'%')->Where('producer_id', $producer_id)->count();
        
        if($compare)
        {
           return redirect('/bid/create')->with('error', 'Bid has already been submitted'); 
        }

        //Bid
        $bid = new Bid;
        $bid->producer_id = $producer_id;
        $bid->dependable_cap = $request->input('dependable_cap'); 
        $bid->voltage_level_of_supply = $request->input('voltage_level_of_supply');
        $bid->duration_of_supply = $request->input('duration_of_supply');
        $bid->frequency_of_supply = $request->input('frequency_of_supply');
        $bid->available_factor = $request->input('available_factor');


        $bid->price_of_energy = $request->input('price_of_energy');
        $bid->capacity_charge = $request->input('capacity_charge');

        $bid_id = Bid::pluck('id')->last();

        //unit avaliable
        $unit_avaliable = new Unit_Avaliable;
        $unit_avaliable->bid_id = $bid_id;
        $unit_avaliable->producer_id = $producer_id;
        $unit_avaliable->corridor = $corridor;
        $unit_avaliable->_1 = $request->input('_1'); 
        $unit_avaliable->_2 = $request->input('_2');
        $unit_avaliable->_3 = $request->input('_3'); 
        $unit_avaliable->_4 = $request->input('_4'); 
        $unit_avaliable->_5 = $request->input('_5'); 
        $unit_avaliable->_6 = $request->input('_6'); 
        $unit_avaliable->_7 = $request->input('_7'); 
        $unit_avaliable->_8 = $request->input('_8'); 
        $unit_avaliable->_9 = $request->input('_9'); 
        $unit_avaliable->_10 = $request->input('_10'); 
        $unit_avaliable->_11 = $request->input('_11'); 
        $unit_avaliable->_12 = $request->input('_12'); 
        $unit_avaliable->_13 = $request->input('_13'); 
        $unit_avaliable->_14 = $request->input('_14');
        $unit_avaliable->_15 = $request->input('_15'); 
        $unit_avaliable->_16 = $request->input('_16'); 
        $unit_avaliable->_17 = $request->input('_17'); 
        $unit_avaliable->_18 = $request->input('_18'); 
        $unit_avaliable->_19 = $request->input('_19'); 
        $unit_avaliable->_20 = $request->input('_20'); 
        $unit_avaliable->_21 = $request->input('_21'); 
        $unit_avaliable->_22 = $request->input('_22'); 
        $unit_avaliable->_23 = $request->input('_23'); 
        $unit_avaliable->_24 = $request->input('_24');  
        $unit_avaliable->total_capacity = $request->input('_1') + $request->input('_2') + $request->input('_3') + $request->input('_4') + $request->input('_5') + $request->input('_6') + $request->input('_7') + $request->input('_8') + $request->input('_9') + $request->input('_10') + $request->input('_11') + $request->input('_12') + $request->input('_13') + $request->input('_14') + $request->input('_15') + $request->input('_16') + $request->input('_17') + $request->input('_18') + $request->input('_19') + $request->input('_20') + $request->input('_21') + $request->input('_22') + $request->input('_23') + $request->input('_24') ;
        
        $unit_avaliable->save();
        $bid->save();

        return redirect('/bid/create')->with('success', 'Bid Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit($bid_id)
    {
        $time = Carbon::today()->toDateString();

        // $compare = Bid::Where('created_at', 'like', $time.'%')->Where('producer_id', $producer_id)->count();
        $bid = Bid::Where('created_at', 'like', $time.'%')->get();
        // var_dump($bid);
        // die();
        $uni = Unit_Avaliable::all();
        $time = Carbon::now();
        $minTime = Carbon::today()->addHours(1);
        $maxTime = Carbon::today()->addHours(24);
        $user_log=auth()->user()->username;
        $user_id = PowerProducer::where('p_username', $user_log)->orWhere('s_username', $user_log)->value('producer_id');
        $bid_id = Bid::where('producer_id', $user_id)->value('id');
        $unit_id = Unit_Avaliable::where('bid_id', $bid_id)->value('id');
        $user_log=auth()->user()->username;
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Bid'];
        $data['bid'] = Bid::find($bid_id)->orderBy('updated_at',' DESC')->first();

        if($time->greaterThanOrEqualTo($minTime) && $time->lessThanOrEqualTo($maxTime)){

         return view('bid.edit', compact('data', 'route', 'count', 'unit_id', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     } else {
                $bid_time = $minTime->diffForHumans($time);
                $bid_time_left = $minTime->diff($time)->format('%H : %I : %S');
                return view('bid.page404', compact('count', 'bid_time', 'bid_time_left', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     }
    }

    public function edit_units($unit_id)
    {
        $bid = Bid::all();
        $uni = Unit_Avaliable::all();
        $time = Carbon::now();
        $minTime = Carbon::today()->addHours(1);
        $maxTime = Carbon::today()->addHours(24);
        $user_log=auth()->user()->username;
        $user_log_name1 = PowerProducer::where('p_username', $user_log)->value('p_full_name');
        $user_log_name2 =PowerProducer::Where('s_username', $user_log)->value('s_full_name');
        $user_edit = User::where('username', $user_log)->value('id');
        $count = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->count();
        $message = Messages::where('to', $user_log_name1)->orWhere('to', $user_log_name2)->orderBy('updated_at',' DESC')->get();
        $route = ['name'=>'Unit_Avaliable'];
        $data['uni'] = Unit_Avaliable::find($unit_id)->orderBy('updated_at',' DESC')->first();
        if($time->greaterThanOrEqualTo($minTime) && $time->lessThanOrEqualTo($maxTime)){

         return view('bid.edit_units', compact('data', 'route', 'count', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     } else {
                $bid_time = $minTime->diffForHumans($time);
                $bid_time_left = $minTime->diff($time)->format('%H : %I : %S');
                return view('bid.page404', compact('count', 'bid_time', 'bid_time_left', 'message', 'user_edit', 'user_log_name1', 'user_log_name2'));
     }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bid_id)
    {
        $newData = [
        
        'dependable_cap' => $request->dependable_cap, 
        'voltage_level_of_supply' => $request->voltage_level_of_supply,
        'duration_of_supply' => $request->duration_of_supply,
        'frequency_of_supply' => $request->frequency_of_supply,
        'available_factor' => $request->available_factor,


        'price_of_energy' => $request->price_of_energy,
        'capacity_charge' => $request->capacity_charge,
        ];

        $bid = Bid::find($bid_id);
        $update = $bid->update($newData);


        if($update)
        {
           
            return redirect()->back()->with('success', 'Record Update Successful');  
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function update_units(Request $request, $unit_id)
    {
        $newData = [
        
        '_1' => $request->_1, 
        '_2' => $request->_2,
        '_3' => $request->_3,
        '_4' => $request->_4,
        '_5' => $request->_5,
        '_6' => $request->_6,
        '_7' => $request->_7,
        '_8' => $request->_8,
        '_9' => $request->_9,
        '_10' => $request->_10,
        '_11' => $request->_11,
        '_12' => $request->_12,
        '_13' => $request->_13,
        '_14' => $request->_14,
        '_15' => $request->_15,
        '_16' => $request->_16,
        '_17' => $request->_17,
        '_18' => $request->_18,
        '_19' => $request->_19,
        '_20' => $request->_20,
        '_21' => $request->_21,
        '_22' => $request->_22,
        '_23' => $request->_23,
        '_24' => $request->_24,
        'total_capacity' => $request->_1 + $request->_2 + $request->_3 + $request->_4 + $request->_5 + $request->_6 +
                           $request->_7 + $request->_8 + $request->_9 + $request->_10 + $request->_11 + $request->_12 +
                           $request->_13 + $request->_14 + $request->_15 + $request->_16 + $request->_17 + $request->_18 +
                           $request->_19 + $request->_20 + $request->_21 + $request->_22 + $request->_23 + $request->_24,

        ];

        $unit = Unit_Avaliable::find($unit_id);
        $update = $unit->update($newData);


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
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
