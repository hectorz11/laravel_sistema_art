<?php

class DeedController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('deeds.admin.index');
	}

	public function getAdminCreate()
	{
		return View::make('deeds.admin.create');
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