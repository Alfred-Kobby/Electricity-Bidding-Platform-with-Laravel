<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketOperator extends Model
{
    // Table Name
    protected $table = 'market_operators';
    //Primary key
    public $primaryKey = 'operator_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['full_name', 'designation', 'cell_phone', 'other_phone', 'email', 'fax_number', 'username', 'password'];

}