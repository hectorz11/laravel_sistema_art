<?php

class AgrarianController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('agrarians.admin.index');
	}

	public function getAdminCreate()
	{
		return View::make('agrarians.admin.create');
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