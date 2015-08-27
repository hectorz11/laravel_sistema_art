<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User
{
	public static $login_rules = array(
		'email' => 'required|email',
		'password' => 'required'
	);

	public function allUsers()
	{
		return self::all();
	}
}