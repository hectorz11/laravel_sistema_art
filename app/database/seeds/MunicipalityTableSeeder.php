<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MunicipalityTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<5; $i++) {

			$municipality = new Municipality;
			$municipality->name = $faker->unique()->streetName;
			$municipality->status = 1;
			$municipality->save();
		}
	}
}