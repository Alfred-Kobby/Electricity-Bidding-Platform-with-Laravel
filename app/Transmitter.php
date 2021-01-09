<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmitter extends Model
{
    // Table Name
    protected $table = 'transmitters';
    //Primary key
    protected $primaryKey = 'transmitter_id';
    
    //Timestamps
    public $timestamps = true;

     protected $fillable = ['transmitter_name', 'email_address', 'postal_address', 'digital_address', 'Physical_location', 'city', 'phone_contact', 'location_of_control_center', 'total_num_of_transmission_lines', 'total_cap_of_transmission_lines', 'transmission_voltage_level_required', 'transmission_frequency_level_required', 'transmission_charge', 'p_full_name', 'p_title', 'p_cell_phone', 'p_other_phone', 'p_email', 'p_fax_number', 'p_username', 'p_password', 's_full_name', 's_title', 's_cell_phone', 's_other_phone', 's_email', 's_fax_number', 's_username', 's_password'];
}
