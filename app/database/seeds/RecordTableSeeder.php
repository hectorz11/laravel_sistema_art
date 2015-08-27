<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecordTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$record = new Record;
			$record->municipality_id = $faker->randomElement($array = array('1','2','3','4','5'));
			$record->number_starting = $faker->randomNumber($nbDigits = 4);
			$record->folio = $faker->randomNumber($nbDigits = 3);
			$record->file = $faker->randomNumber($nbDigits = 3);
			$record->date = $faker->date($format = 'Y-m-d', $max = 'now');,
			$record->interested_m = $faker->firstNameMale.' '.$faker->lastNameMale;
			$record->interested_f = $faker->firstNameFemale.' '.$faker->lastNameFemale;
			$record->starting = $faker->word;
			$record->description = $faker->sentence($nbWords = 6);
			$record->status = 1;
			$record->save();
		}
	}
}