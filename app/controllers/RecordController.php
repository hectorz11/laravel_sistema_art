<?php

class RecordController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('records.admin.index');
	}

	public function getAdminCreate()
	{
		return View::make('records.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('records.admin.update');
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