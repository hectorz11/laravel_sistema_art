<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeeds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deeds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('notary_id')->unsigned();
			$table->string('number_deeds')->nullable();
			$table->string('protocol')->nullable();
			$table->string('folio')->nullable();
			$table->string('given_by')->nullable();
			$table->string('pro')->nullable();
			$table->string('type_writing')->nullable();
			$table->string('date')->nullable();
			$table->string('number_folios')->nullable();
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
		Schema::drop('deeds');
	}

}
