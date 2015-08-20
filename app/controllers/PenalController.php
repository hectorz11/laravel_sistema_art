<?php

class PenalController extends \BaseController {

	public function getAdminIndex()
	{
		return View::make('penals.admin.index');
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