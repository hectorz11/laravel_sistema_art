<?php

class RecordController extends \BaseController {

	protected $record = null;

	public function __construct(Record $record, Municipality $municipality)
	{
		$this->record = $record;
		$this->municipality = $municipality;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['record_index'])) {
			if (Request::ajax()) {
				$result = DB::table('records')
				->select(array(
					'records.id',
					'municipalities.name as name',
					'records.number_starting as number',
					'records.date as date',
					'records.interested_m as interested_m',
					'records.interested_f as interested_f',
					'records.starting as starting'))
				->join('municipalities', 'records.municipality_id', '=', 'municipalities.id')
				->where('records.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('municipalities.name','records.number_starting','records.interested_m','records.interested_f','records.starting')
				->orderColumns('id','records.number_starting')
				->showColumns('id','name','number','date','interested_m','interested_f','starting')
				->addColumn('Operaciones', function($model)
				{
					return "<a href='".URL::route('admin.records.edit', $model->id)."'>
								<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
							</a>
							<a href='#' id=$model->id data-toggle='modal'>
								<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
							</a>";
				})->make();
			} else {
				return View::make('records.admin.index');
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['record_create'])) {
			$municipalities = $this->municipality->allMunicipalities();
			return View::make('records.admin.create', ['municipalities' => $municipalities]);
		} else {
			return View::make('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['record_create'])) {
			$answer = Record::createRecord(Input::all());
			if ($answer['error'] == true) {
				return Redirect::route('admin.records.create')
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.records.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['record_update'])) {
			$municipalities = $this->municipality->allMunicipalities();
			$record = $this->record->selectRecord($id);
			if (Request::ajax()) {
				return Response::json(['record' => $record, 'municipalities' => $municipalities]);
			} else {
				return View::make('records.admin.edit', ['record' => $record, 'municipalities' => $municipalities]);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['record_update'])) {
			$answer = Record::updateRecord(Input::all(), $id);
			if ($answer['error'] == true) {
				return Redirect::route('admin.records.edit', $id)
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.records.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function deleteAdminDelete($id)
	{
		//
	}

}