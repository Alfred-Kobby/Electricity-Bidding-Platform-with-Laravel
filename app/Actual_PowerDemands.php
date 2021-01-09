<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actual_PowerDemands extends Model
{
     // Table Name
    protected $table = 'actual_power_demands';
    //Primary key
    public $primarykey = 'actual_power_id';
    
    //Timestamps
    public $timestamps = true;
}
