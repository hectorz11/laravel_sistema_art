<?php 

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i<25; $i++) {

			$comment = new Comment;
			$comment->description = $faker->sentence($nbWords = 10);
			$comment->profile_id = $faker->randomElement($array = array('7','8','9','10'));
			$comment->status = 1;
			$comment->save();
		}
	}
}