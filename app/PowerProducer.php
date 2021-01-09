<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerProducer extends Model
{
    // Table Name
    protected $table = 'power_producers';
    //Primary key
    protected $primaryKey = 'producer_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['organisation_name', 'email_address', 'postal_address', 'digital_address', 'Physical_location', 'city', 'telephone_number', 'total_min_installed_capacity', 'total_max_installed_capacity', 'num_of_transmission_lines', 'total_cap_of_transmission_lines', 'total_len_of_transmission_lines', 'gen_source', 'p_full_name', 'p_title', 'p_cell_phone', 'p_other_phone', 'p_email', 'p_fax_number', 'p_username', 'p_password', 's_full_name', 's_title', 's_cell_phone', 's_other_phone', 's_email', 's_fax_number', 's_username', 's_password'];

}
