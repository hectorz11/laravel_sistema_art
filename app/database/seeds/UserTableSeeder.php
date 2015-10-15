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

		// users ID = 1
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 2
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 3
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 4
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 5
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 6
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
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 7
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
		$profile->position = '';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'female';
		$profile->user_id = $user->id;
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 8
		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'jorge.linares@yopmail.com',
			'first_name' => 'Jorge',
			'last_name' => 'Linares Vera',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUsuario);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = '';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 9
		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'jonathan.conde@yopmail.com',
			'first_name' => 'Elí Jonathan',
			'last_name' => 'Conde Maquera',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUsuario);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = '';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'male';
		$profile->user_id = $user->id;
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();

		// users ID = 10
		$sentry = Sentry::getUserProvider()->create(array(
			'email' => 'yessica.quispe@yopmail.com',
			'first_name' => 'Yessica Yobana',
			'last_name' => 'Quispe Condori',
			'password' => '123456',
			'activated' => true
		));
		$sentry->addGroup($groupUsuario);
		$user = User::find($sentry->id);

		$profile = new Profile;
		$profile->photo = $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
		$profile->position = '';
		$profile->birthday = $faker->date($format = 'd/m/Y', $max = 'now');
		$profile->phone = $faker->unique()->phoneNumber;
		$profile->gender = 'female';
		$profile->user_id = $user->id;
		$profile->social_id = 0;
		$profile->provider = 'ART';
		$profile->status = 1;
		$profile->save();
	}
}