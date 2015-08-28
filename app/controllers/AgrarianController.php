<?php

class AgrarianController extends \BaseController {

	protected $agrarian = null;

	public function __construct(Agrarian $agrarian)
	{
		$this->agrarian = $agrarian;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['agrarian_index'])) {
			return Response::json($this->agrarian->allAgrarians());
		}
	}

	public function getAdminCreate()
	{
		return View::make('agrarians.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('agrarians.admin.update');
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