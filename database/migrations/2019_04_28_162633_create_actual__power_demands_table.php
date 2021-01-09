<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualPowerDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actual_power_demands', function (Blueprint $table) {
            $table->increments('actual_power_id');
            $table->integer('customer_id');
            $table->integer('_1');
            $table->integer('_2');
            $table->integer('_3');
            $table->integer('_4');
            $table->integer('_5');
            $table->integer('_6');
            $table->integer('_7');
            $table->integer('_8');
            $table->integer('_9');
            $table->integer('_10');
            $table->integer('_11');
            $table->integer('_12');
            $table->integer('_13');
            $table->integer('_14');
            $table->integer('_15');
            $table->integer('_16');
            $table->integer('_17');
            $table->integer('_18');
            $table->integer('_19');
            $table->integer('_20');
            $table->integer('_21');
            $table->integer('_22');
            $table->integer('_23');
            $table->integer('_24');
            $table->integer('total_actual_demand');
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
        Schema::dropIfExists('actual_power_demands');
    }
}
