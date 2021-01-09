<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_producers', function (Blueprint $table) {
            //General Information
            $table->increments('producer_id');
            $table->string('organisation_name');
            $table->string('email_address');
            $table->string('postal_address');
            $table->string('digital_address');
            $table->string('telephone_number');
            $table->string('city');
            $table->string('physical_location');
            
            

            //Technical Information
            $table->integer('total_min_installed_capacity');
            $table->integer('total_max_installed_capacity');
            $table->integer('total_cap_of_transmission_lines');
            $table->integer('total_len_of_transmission_lines');
            $table->string('gen_source');
            $table->string('corridor');

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
        Schema::dropIfExists('power_producers');
    }
}
