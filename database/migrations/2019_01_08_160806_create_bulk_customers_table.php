<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('organisation_name');
            $table->string('country_region');
            $table->string('email_address');
            $table->string('postal_address');
            $table->string('digital_address');
            $table->string('telephone_number');
            $table->string('city');
            $table->string('physical_location');
            $table->string('customer_type');
            
           //primary Market coordinator
            $table->string('p_full_name');
            $table->string('p_title');
            $table->string('p_cell_phone');
            $table->string('p_other_phone');
            $table->string('p_email');
            $table->string('p_fax_number');
            $table->string('p_username');
            $table->string('p_password');

            //Market coordinator
            $table->string('s_full_name');
            $table->string('s_title');
            $table->string('s_cell_phone');
            $table->string('s_other_phone');
            $table->string('s_email');
            $table->string('s_fax_number');
            $table->string('s_username');
            $table->string('s_password');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulk_customers');
    }
}
