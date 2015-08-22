<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgrarians extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agrarians', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number_agrarian')->nullable();
			$table->string('date')->nullable();
			$table->string('demandant')->nullable();
			$table->string('defendant')->nullable();
			$table->string('matery')->nullable();
			$table->string('secretary')->nullable();
			$table->string('file')->nullable();
			$table->text('references')->nullable();
			$table->text('description')->nullable();
			$table->integer('status')->unsigned();
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
		Schema::drop('agrarians');
	}

}
