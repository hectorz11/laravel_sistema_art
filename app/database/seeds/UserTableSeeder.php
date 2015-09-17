<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::table('users')->delete();
		
		$groupAdministrador = Sentry::findGroupByName('administrador');
		$groupDirector = Sentry::findGroupByName('director');
		$groupSecretaria = Sentry::findGroupByName('secretaria');
		$groupPracticante = Sentry::findGroupByName('practicante');
		$groupUsuario = Sentry::findGroupByName('usuario');

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'admin@yopmail.com',
			'first_name' => 'Archivo',
			'last_name' => 'Regional Tacna',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupAdministrador);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Administrador';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'norberto.lanchipa@yopmail.com',
			'first_name' => 'Norberto',
			'last_name' => 'Lanchipa Palza',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupDirector);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Director del Archivo Regional de Tacna';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'milagros.liendo@yopmail.com',
			'first_name' => 'Milagros',
			'last_name' => 'Liendo',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupSecretaria);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Secretaria Jefe';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'female';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'laura.salas@yopmail.com',
			'first_name' => 'Laura',
			'last_name' => 'Salas',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupSecretaria);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Directora del Archivo Histórico';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'female';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'wilton.condori@yopmail.com',
			'first_name' => 'Wilton',
			'last_name' => 'Condori Sahua',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupPracticante);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Practicante';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'hector.zapana@yopmail.com',
			'first_name' => 'Hector Raul',
			'last_name' => 'Zapana Condori',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupPracticante);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Practicante';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();

		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'diana.cardenas@yopmail.com',
			'first_name' => 'Diana',
			'last_name' => 'Cardenas Palza',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUsuario);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = 'Practicante';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'female';
		$profile->user_id = $user->id;
		$profile->status = 1;
		$profile->save();
	}
}