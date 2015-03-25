<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDrawingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('drawings', function($table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('drawing_title');
            $table->string('drawing_file');
            $table->integer('active');
            $table->timestamps();

            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::drop('drawings');
    }

}
