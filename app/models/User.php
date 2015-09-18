<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User
{
	public static $login_rules = [
		'email' => 'required',
		'password' => 'required',
	];

	public function allUsers()
	{
		return self::all();
	}

	public function profiles()
	{
		return $this->hasOne('Profile','user_id');
	}

	public static function createUser($input)
	{
		$answer = [];
		$rules = [
			'email' => 'required|email',
			'password' => 'required'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$adminGroup = Sentry::findGroupByName('usuario');
			$sentry = Sentry::getUserProvider()->create(array(
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'activated' => false,
			));
			$sentry->addGroup($adminGroup);
			$user = User::find($sentry->id);

			$profile = new Profile;
			if (Input::has('photo')) $profile->photo = Input::get('photo');
			else $profile->photo = '';
			if (Input::has('birthday')) $profile->birthday = Input::get('birthday');
			else $profile->birthday = '';
			if (Input::has('phone')) $profile->phone = Input::get('phone');
			else $profile->phone = '';
			if (Input::has('gender')) $profile->gender = Input::get('gender');
			else $profile->gender = '';
			$profile->user_id = $user->id;
			$profile->status = 1;

			if($profile->save()) {
				$answer['mensaje'] = 'Creado con exito!';
				$answer['error'] = false;
				$answer['data'] = $sentry;
			} else {
				$answer['mensaje'] = 'PROFILE CREATE: error, team noob!';
				$answer['error'] = false;
			}
		}
		return $answer;
	}
}