<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CivilTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$civil = new Civil;
			$civil->number_civil = $faker->randomNumber($nbDigits = 5);
			$civil->date = $faker->date($format = 'Y-m-d', $max = 'now');
			$civil->demandant = $faker->firstName.' '.$faker->lastName;
			$civil->defendant = $faker->firstName.' '.$faker->lastName;
			$civil->matery = $faker->word;
			$civil->secretary = $faker->word;
			$civil->file = $faker->randomNumber($nbDigits = 3);
			$civil->references = $faker->sentence($nbWords = 6);
			$civil->description = $faker->sentence($nbWords = 6);
			$civil->status = 1;
			$civil->save();
		}
	}
}