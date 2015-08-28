<?php

class NotaryController extends \BaseController {

	protected $notary = null;

	public function __construct(Notary $notary)
	{
		$this->notary = $notary;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['notary_index'])) {
			return Response::json($this->notary->allNotaries());
		}
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('notaries.admin.update');
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