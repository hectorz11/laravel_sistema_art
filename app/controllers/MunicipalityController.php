<?php

class MunicipalityController extends \BaseController {

	protected $municipality = null;

	public function __construct(Municipality $municipality)
	{
		$this->municipality = $municipality;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['municipality_index'])) {
			return Response::json($this->municipality->allMunicipalities());
		}
	}

	public function getAdminCreate()
	{
		return View::make('municipalities.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('municipalities.admin.update');
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