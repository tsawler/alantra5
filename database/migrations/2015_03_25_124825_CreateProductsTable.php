<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('products', function($table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('description');
            $table->string('title_fr')->nullable();
            $table->text('description_fr')->nullable();
            $table->timestamps();
            $table->integer('active');
            $table->string('slug')->nullable();
            $table->integer('electric_heat')->default(0);
            $table->integer('communications_panel')->default(0);
            $table->integer('ac')->default(0);
            $table->integer('electric_mast')->default(0);
            $table->integer('drawing_tables')->default(0);
            $table->integer('emergency_lights')->default(0);
            $table->integer('coat_hooks')->default(0);
            $table->integer('bulletin_boards')->default(0);
            $table->integer('window_bars')->default(0);
            $table->integer('office_desks')->default(1);
            $table->integer('office_chairs')->default(1);
            $table->integer('folding_chairs')->default(1);
            $table->integer('folding_tables')->default(1);
            $table->integer('filing_cabinets')->default(1);
            $table->integer('lockers')->default(1);
            $table->integer('fridges')->default(1);
            $table->integer('microwaves')->default(1);
            $table->integer('water_coolers')->default(1);
            $table->integer('insurance')->default(1);
            $table->integer('category_id')->nullable();
        });
    }

    public function down() {
        Schema::drop('products');
    }

}
