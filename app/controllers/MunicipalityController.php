<?php

class MunicipalityController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('municipalities.admin.index');
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