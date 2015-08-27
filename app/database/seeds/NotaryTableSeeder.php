<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotaryTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<5; $i++) {

			$notary = new Notary;
			$notary->name = $faker->unique()->name;
			$notary->status = 1;
			$notary->save();
		}
	}
}