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
		if (Sentry::hasAnyAccess(['users_index'])) {
			$users = $this->user->allUsers();
			return View::make('users.admin.index', ['users' => $users]);
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminCreate()
	{
		return View::make('deeds.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) {
			$user = $this->user->selectUser();
			return View::make('users.admin.edit', ['user' => $user]);
		} else {
			return View::make('pages.error');
		}
		
	}

	public function postAdminUpdate($id)
	{
		//
	}

	public function postAdminDelete($id)
	{
		//
	}

}