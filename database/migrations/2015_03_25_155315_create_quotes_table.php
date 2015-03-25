<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('quotes', function($table) {
            $table->increments('id');
            $table->string('company');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->date('date_needed')->nullable();
            $table->text('message');
            $table->text('interested_in')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('quotes');
    }

}
