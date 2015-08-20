<?php

class NotaryController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('notaries.admin.index');
	}

	public function getAdminCreate()
	{
		return View::make('notaries.admin.create');
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