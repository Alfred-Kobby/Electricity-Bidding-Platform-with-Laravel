<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_operators', function (Blueprint $table) {
            $table->increments('operator_id');
            $table->string('transmitter_name');
            $table->string('mailing_address');
            $table->string('contact_address');
            $table->string('center_location');
            $table->string('phone_contact_1');
            $table->string('phone_contact_2');
            $table->string('full_name');
            $table->string('title');
            $table->string('cell_phone');
            $table->string('other_phone');
            $table->string('email');
            $table->string('fax_number');
            $table->string('username');
            $table->string('password');
            
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
        Schema::dropIfExists('market_operators');
    }
}
