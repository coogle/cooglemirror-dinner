<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Cooglemirror\Dinner\Models\DinnerMenu;

class CreateDinnermenuTable extends Migration {

	/**
	 * Run the migrations, populate the dinner menu
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("dinner_menu", function(Blueprint $table) {
		    $table->enum('day', ['sun', 'mon', 'tues', 'weds', 'thurs', 'fri', 'sat'])->unique();
		    $table->string('menu');
		    $table->timestamps();
		});
		
		foreach(['sun', 'mon', 'tues', 'weds', 'thurs', 'fri', 'sat'] as $dayOfWeek) {
		    $blankDay = new DinnerMenu();
		    $blankDay->day = $dayOfWeek;
		    $blankDay->menu = "?????";
		    $blankDay->save();
		}
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
