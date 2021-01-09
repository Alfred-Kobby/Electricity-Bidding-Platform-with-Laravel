<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producer_id');
            $table->integer('dependable_cap');
            $table->string('voltage_level_of_supply');
            $table->integer('duration_of_supply');
            $table->string('frequency_of_supply');
            $table->string('available_factor');

            $table->string('price_of_energy');
            $table->string('capacity_charge');
            
             
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
        Schema::dropIfExists('bids');
    }
}
