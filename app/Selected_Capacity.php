<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selected_Capacity extends Model
{
    // Table Name
    protected $table = 'selected_capacities';
    //Primary key
    public $primarykey = 'selected_cap_id';
    
    //Timestamps
    public $timestamps = true;
}
