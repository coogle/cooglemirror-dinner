<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinnermenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("dinner_menu", function(Blueprint $table) {
		    $table->enum('day', ['sun', 'mon', 'tues', 'weds', 'thurs', 'fri'])->unique();
		    $table->string('menu');
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
		Schema::drop('dinner_menu');
	}

}
