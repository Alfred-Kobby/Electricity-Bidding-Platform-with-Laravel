<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkCustomers extends Model
{
     // Table Name
    protected $table = 'bulk_customers';
    //Primary key
    public $primaryKey = 'customer_id';
    
    //Timestamps
    public $timestamps = true;

    protected $fillable = ['organisation_name', 'email_address', 'postal_address', 'digital_address', 'Physical_location', 'city', 'telephone_number', 'p_full_name', 'p_title', 'p_cell_phone', 'p_other_phone', 'p_email', 'p_fax_number', 'p_username', 'p_password', 's_full_name', 's_title', 's_cell_phone', 's_other_phone', 's_email', 's_fax_number', 's_username', 's_password'];
}
