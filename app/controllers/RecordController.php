<?php

class RecordController extends \BaseController {

	protected $record = null;

	public function __construct(Record $record)
	{
		$this->record = $record;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['record_index'])) {
			return Response::json($this->record->allRecords());
		}
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