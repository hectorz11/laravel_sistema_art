<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel 
{
	public static $login_rules = [
		'email' => 'required',
		'password' => 'required',
	];

	public function allUsers()
	{
		return self::all();
	}

	public function selectUser($id)
	{
		return self::find($id);
	}

	public function profiles()
	{
		return $this->hasOne('Profile','user_id');
	}

	public function tokens()
	{
		return $this->hasMany('Token', 'user_id');
	}

	public static function permissions($id, $name_permissions)
	{
		$group = Sentry::findGroupById($id);
		foreach ($group->getPermissions() as $name => $activated) {
			if ($name_permissions == $name && $activated == 1) return True;
		}
	}

	public static function createUser($input)
	{
		$answer = [];
		$rules = [
			'email' => 'required|email|unique:users,email',
			'first_name' => 'required',
			'password' => 'required',
			're_password' => 'required|same:password',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$answer['message'] = $validation;
			$answer['error'] = true;
		} else {
			$adminGroup = Sentry::findGroupByName('usuario');
			$sentry = Sentry::getUserProvider()->create(array(
				'first_name' => $input['first_name'],
				'last_name' => $input['last_name'],
				'email' => $input['email'],
				'password' => $input['password'],
				'activated' => false,
			));
			$sentry->addGroup($adminGroup);
			$user = User::find($sentry->id);

			$profile = new Profile;
			if (Input::has('social_id')) $profile->social_id = $input['social_id'];
			else $profile->social_id = '';
			if (Input::has('token')) $profile->access_token = $input['token'];
			else $profile->access_token = '';
			if (Input::has('provider')) $profile->provider = $input['provider'];
			else $profile->provider = '';
			if (Input::has('photo')) $profile->photo = $input['photo'];
			else $profile->photo = '';
			if (Input::has('birthday')) $profile->birthday = $input['birthday'];
			else $profile->birthday = '';
			if (Input::has('phone')) $profile->phone = $input['phone'];
			else $profile->phone = '';
			if (Input::has('gender')) $profile->gender = $input['gender'];
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