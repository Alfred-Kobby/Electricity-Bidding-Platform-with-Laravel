<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerDemand extends Model
{
    // Table Name
    protected $table = 'power_demands';
    //Primary key
    public $primarykey = 'id';
    
    //Timestamps
    public $timestamps = true;
}
