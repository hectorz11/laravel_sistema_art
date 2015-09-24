<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfiles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('photo')->nullable();
			$table->string('position')->nullable();
			$table->string('birthday')->nullable();
			$table->string('phone')->nullable();
			$table->string('gender')->nullable();
			$table->integer('user_id')->unsigned();
			$table->bigInteger('social_id')->unsigned();
			$table->string('access_token')->nullable();
			$table->string('provider')->nullable();
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
		Schema::drop('profiles');
	}

}
