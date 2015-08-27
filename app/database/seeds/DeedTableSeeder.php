<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DeedTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$deed = new Deed;
			$deed->notary_id = $faker->randomElement($array = array('1','2','3','4','5'));
			$deed->number_deeds = $faker->randomNumber($nbDigits = 5);
			$deed->protocol = $faker->randomNumber($nbDigits = 4);
			$deed->folio = $faker->randomNumber($nbDigits = 3);
			$deed->given_by = $faker->firstName.' '.$faker->lastName;
			$deed->pro = $faker->firstName.' '.$faker->lastName;
			$deed->type_writing = $faker->word;
			$deed->date = $faker->date($format = 'Y-m-d', $max = 'now');
			$deed->number_folios = $faker->randomNumber($nbDigits = 3);
			$deed->description = $faker->sentence($nbWords = 6);
			$deed->status = 1;
			$deed->save();
		}
	}
}