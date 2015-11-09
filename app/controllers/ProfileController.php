<?php

class ProfileController extends \BaseController {

	/**
	 * Atributos de ProfileController
	 *
	 */
	protected $user = null;
	protected $profile = null;

	/**
	 * Metodos de ProfileController
	 *
	 */
	public function __construct(User $user, Profile $profile)
	{
		$this->user = $user;
		$this->profile = $profile;
	}

	/**
	 * admin.profiles.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$user = $this->user->selectUser($id);

			return View::make('pages.admin.profile', ['user' => $user]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.profiles.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$answer = $this->profile->updateProfile(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.profiles.edit', $id)
				->withErrors($answer['message'])->withInput;
			}
			else {
				return Redirect::route('admin.profiles.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else return Redirect::route('pages.error');
	}

	/**
	 * users.profiles.edit
	 *
	 */
	public function getUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$user = $this->user->selectUser($id);

			return View::make('pages.user.profile', ['user' => $user]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * users.profiles.update
	 *
	 */
	public function putUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['profiles_update'])) 
		{
			$answer = $this->profile->updateProfile(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('users.profiles.edit', $id)
				->withErrors($answer['message'])->withInput;
			}
			else {
				return Redirect::route('users.profiles.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

}