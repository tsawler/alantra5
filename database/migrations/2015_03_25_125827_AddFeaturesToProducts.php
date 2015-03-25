<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturesToProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::table('products', function($table)
        {
            $table->integer('water_septic')->default(0);
            $table->integer('exhaust_fans')->default(0);
            $table->integer('hot_water_heaters')->default(0);
            $table->integer('laundry_sink')->default(0);
            $table->integer('hand_dryers')->default(0);
            $table->integer('toilets')->default(0);
            $table->integer('urinals')->default(0);
            $table->integer('sinks')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
