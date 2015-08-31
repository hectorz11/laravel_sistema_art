<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AgrarianTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$agrarian = new Agrarian;
			$agrarian->number_agrarian = $faker->randomNumber($nbDigits = 5);
			$agrarian->date = $faker->date($format = 'Y-m-d', $max = 'now');
			$agrarian->demandant = $faker->firstName.' '.$faker->lastName;
			$agrarian->defendant = $faker->firstName.' '.$faker->lastName;
			$agrarian->matery = $faker->word;
			$agrarian->secretary = $faker->firstName.' '.$faker->lastName;
			$agrarian->file = $faker->randomNumber($nbDigits = 3);
			$agrarian->references = $faker->sentence($nbWords = 6);
			$agrarian->description = $faker->sentence($nbWords = 6);
			$agrarian->status = 1;
			$agrarian->save();
		}
	}
}