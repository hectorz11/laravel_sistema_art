<?php

class CivilController extends \BaseController {

	protected $civil = null;

	public function __construct(Civil $civil)
	{
		$this->civil = $civil;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['civil_index'])) {
			return Response::json($this->civil->allCivils());
		}
	}

	public function getAdminCreate()
	{
		return View::make('civils.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('civils.admin.update');
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