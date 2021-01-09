<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected__capacities', function (Blueprint $table) {
            $table->increments('selected_cap_id');
            $table->string('producer_id');
            $table->string('organization_name');
            $table->string('duration_of_supply');
            $table->string('capacity_selected');
            $table->string('total_transmission_charge');
            $table->string('total_cost_of_production');
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
        Schema::dropIfExists('selected__capacities');
    }
}
