<?php

class DeedController extends \BaseController {

	protected $deed = null;

	public function __construct(Deed $deed)
	{
		$this->deed = $deed;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['deed_index'])) {
			$deed = $this->deed->allDeeds();
			return Response::json($deed);
			/*$notaries = $this->notary->allNotary();
			$deeds = $this->deed->allDeeds();
			return View::make('deeds.admin.index')
			->with(['deeds' => $deeds, 'notaries' => $notaries]);*/
		}
	}

	public function index()
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

	public function getAdminUpdate($id)
	{
		return View::make('deeds.admin.update');
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