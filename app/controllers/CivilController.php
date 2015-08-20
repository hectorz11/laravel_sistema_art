<?php

class CivilController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('civils.admin.index');
	}

	public function getAdminCreate()
	{
		return View::make('civils.admin.create');
	}

	public function postAdminCreate()
	{
		//
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