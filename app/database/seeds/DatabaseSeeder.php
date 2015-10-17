<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('NotaryTableSeeder');
		$this->call('MunicipalityTableSeeder');
		$this->call('DeedTableSeeder');
		$this->call('AgrarianTableSeeder');
		$this->call('CivilTableSeeder');
		$this->call('PenalTableSeeder');
		$this->call('RecordTableSeeder');
		$this->call('CommentTableSeeder');
	}

}
