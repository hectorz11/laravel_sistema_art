<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenalTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$penal = new Penal;
			$penal->number_penal = $faker->randomNumber($nbDigits = 5);
			$penal->acussed = $faker->firstName.' '.$faker->lastName;
			$penal->start_date = $faker->date($format = 'Y-m-d', $max = 'now');
			$penal->crime = $faker->sentence($nbWords = 4);
			$penal->aggrieved = $faker->firstName.' '.$faker->lastName;
			$penal->judge = $faker->firstName.' '.$faker->lastName;
			$penal->scribe = $faker->firstName.' '.$faker->lastName;
			$penal->references = $faker->sentence($nbWords = 6);
			$penal->description = $faker->sentence($nbWords = 6);
			$penal->status = 1;
			$penal->save();
		}
	}
}