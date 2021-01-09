<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketRules extends Model
{
     // Table Name
    protected $table = 'market_rules';
    //Primary key
    protected $primaryKey = 'rule_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['operator_id', 'reference_num', 'title',  'description'];
}
