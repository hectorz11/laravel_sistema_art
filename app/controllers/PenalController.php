<?php

class PenalController extends \BaseController {

	protected $penal = null;

	public function __construct(Penal $penal)
	{
		$this->penal = $penal;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['penal_index'])) {
			return Response::json($this->penal->allPenals());
		}
	}

	public function getAdminCreate()
	{
		return View::make('penals.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('penals.admin.update');
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