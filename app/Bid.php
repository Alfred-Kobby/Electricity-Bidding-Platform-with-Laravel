<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    // Table Name
    protected $table = 'bids';
    //Primary key
    public $primarykey = 'bid_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['dependable_cap', 'voltage_level_of_supply', 'duration_of_supply',  'frequency_of_supply', 'num_of_gen_units', 'available_factor', 'price_of_energy', 'capacity_charge'];
}
