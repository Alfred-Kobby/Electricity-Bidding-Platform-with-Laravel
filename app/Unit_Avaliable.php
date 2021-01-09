<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit_Avaliable extends Model
{
    // Table Name
    protected $table = 'unit__avaliables';
    //Primary key
    public $primarykey = 'unit_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['_1', '-2', '_3', '_4', '_5', '_6', '_7', '_8', '_9', '_10', '_11', '_12', '_13', '_14', '_15', '_16', '_17', '_18', '_19', '_20', '_21', '_24', 'total_capacity'];
}
