<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('testimonials', function ($table)
        {
            $table->increments('id');
            $table->string('person');
            $table->string('company');
            $table->text('testimonial');
            $table->text('testimonial_fr');
            $table->date('testimonial_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('testimonials');
    }

}
