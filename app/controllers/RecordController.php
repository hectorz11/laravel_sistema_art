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
			$records = $this->record->allRecords();
			//return Response::json($records);
			$municipalities = $this->municipality->allMunicipalities();
			return View::make('records.admin.index')
			->with(['records' => $records, 'municipalities' => $municipalities]);
		}
	}

	public function getDatatable()
	{
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
			return "<a href='#' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a href='#' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
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