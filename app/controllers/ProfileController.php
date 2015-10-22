<?php

class ProfileController extends \BaseController {

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$user = User::find($id);
			return View::make('pages.admin.profile', ['user' => $user]);
		} 
		else return Redirect::route('pages.error');
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$answer = Profile::updateProfile(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.profiles.edit', $id)
				->withErrors($answer['message'])->withInput;
			else
				return Redirect::route('admin.profiles.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
		} 
		else return Redirect::route('pages.error');
	}

	public function getUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$user = User::find($id);
			return View::make('pages.user.profile', ['user' => $user]);
		} 
		else return Redirect::route('pages.error');
	}

	public function putUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$answer = Profile::updateProfile(Input::all(), $id);

			if ($answer['error'] == true)
				return Redirect::route('users.profiles.edit', $id)
				->withErrors($answer['message'])->withInput;
			else
				return Redirect::route('users.profiles.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
		} 
		else return Redirect::route('pages.error');
	}

}