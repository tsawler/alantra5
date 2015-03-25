<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('product_images', function($table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('image_name');
            $table->timestamps();

            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    public function down() {
        Schema::drop('product_images');
    }

}
