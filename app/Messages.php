<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    // Table Name
    protected $table = 'messages';
    //Primary key
    protected $primaryKey = 'message_id';
    
    //Timestamps
    public $timestamps = true;
}
