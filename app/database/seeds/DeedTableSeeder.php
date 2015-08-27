<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotaryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<10; $i++) {

			$deed = new Deed;
			$deed->notary_id = $faker->unique()->name;
			$deed->number_deeds = $faker->
			$deed->protocol = $faker->
			$deed->folio = $faker->
			$deed->given_by = $faker->
			$deed->pro = $faker->
			$deed->type_writing = $faker->
			$deed->date = $faker->
			$deed->number_folios = $faker->
			$deed->description = $faker->
			$deed->status = 1;
			$deed->save();
		}
	}
}