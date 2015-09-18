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
		//
	}

	/*
	|--------------------------------------------------------------------------
	| Controlador que gestiona los procesos del Administrador
	|--------------------------------------------------------------------------
	|
	*/
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['user_index'])) {
			return Response::json($this->user->allUsers());
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
		return View::make('deeds.admin.update');
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