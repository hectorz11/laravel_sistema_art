<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('municipality_id')->unsigned();
			$table->string('number_starting')->nullable();
			$table->string('folio')->nullable();
			$table->string('file')->nullable();
			$table->string('date')->nullable();
			$table->string('interested_m')->nullable();
			$table->string('interested_f')->nullable();
			$table->string('starting')->nullable();
			$table->string('description')->nullable();
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
		Schema::drop('records');
	}

}
