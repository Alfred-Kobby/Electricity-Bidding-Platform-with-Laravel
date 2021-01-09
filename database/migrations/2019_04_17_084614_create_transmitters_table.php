<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransmittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmitters', function (Blueprint $table) {
            //general Info
            $table->increments('transmitter_id');
            $table->string('transmitter_name');
            $table->string('email_address');
            $table->string('postal_address');
            $table->string('digital_address');
            $table->string('phone_contact');
            $table->string('location_of_control_center');

            //technical info
            $table->integer('total_num_of_transmission_lines');
            $table->integer('total_cap_of_transmission_lines');
            $table->integer('transmission_voltage_level_required');
            $table->integer('transmission_frequency_level_required');

            //financial info
            $table->integer('transmission_charge');

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
        Schema::dropIfExists('transmitters');
    }
}
