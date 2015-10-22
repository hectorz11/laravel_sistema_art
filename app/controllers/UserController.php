<?php

class UserController extends \BaseController {

	protected $user = null;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
	/*
	|--------------------------------------------------------------------------
	| Controlador que gestionar los procesos del Usuario
	|--------------------------------------------------------------------------
	|
	*/
	public function getIndex()
	{
		$sentry = Sentry::getUser();
		$user = $this->user->selectUser($sentry->id);
		return View::make('pages.user.user', ['user' => $user]);
	}

	/*
	|--------------------------------------------------------------------------
	| Controlador que gestiona los procesos del Administrador
	|--------------------------------------------------------------------------
	|
	*/
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['users_index']))
		{
			$users = $this->user->allUsers();
			return View::make('users.admin.index', ['users' => $users]);
		} 
		else return Redirect::route('pages.error');
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) 
		{
			$user = $this->user->selectUser($id);
			return View::make('users.admin.edit', ['user' => $user]);
		} 
		else return Redirect::route('pages.error');
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) 
		{
			$answer = User::updateUser(Input::all(), $id);
			if ($answer['error'] == true) 
				return Redirect::route('admin.users.edit', $id)
				->withErrors($answer['message'])->withInput();
			else 
				return Redirect::route('admin.users.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
		} 
		else return Redirect::route('pages.error');
	}

	public function getAdminRole($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) {
			$user = $this->user->selectUser($id);
			$groups = Sentry::findAllGroups();
			return View::make('users.admin.roles.edit', ['user' => $user, 'groups' => $groups]);
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function postAdminRole($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) {
			$sentry = Sentry::findUserById($id);
			$groups_1 = Sentry::findAllGroups();
			$groups = Input::get('groups');

			foreach ($groups_1 as $group_1) {
				$sentry->groups()->detach($group_1);
			}
			if (isset($groups)) {
				foreach ($groups as $group) {
					$sentry->groups()->attach($group);
				}
			}
			return Redirect::route('admin.users.role', $id)
			->with(['message' => 'Fue un exito la operación!', 'class' => 'success']);
		} else {
			return Redirect::route('pages.error');
		}
	}

}