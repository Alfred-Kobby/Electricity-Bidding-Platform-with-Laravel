<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class optimizer extends Model
{
     // Table Name
    protected $table = 'reserved';
    //Primary key
    public $primaryKey = 'reserved_id';
    
    //Timestamps
    public $timestamps = true;
}
