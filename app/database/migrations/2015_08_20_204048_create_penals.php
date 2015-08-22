<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenals extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number_penal')->nullable();
			$table->string('acussed')->nullable();
			$table->string('start_date')->nullable();
			$table->string('crime')->nullable();
			$table->string('aggrieved')->nullable();
			$table->string('judge')->nullable();
			$table->string('scribe')->nullable();
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
		Schema::drop('penals');
	}

}
