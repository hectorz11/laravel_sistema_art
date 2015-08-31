<?php

class PenalController extends \BaseController {

	protected $penal = null;

	public function __construct(Penal $penal)
	{
		$this->penal = $penal;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['civil_index'])) {
			$penals = $this->penal->allPenals();
			//return Response::json($penals);
			return View::make('penals.admin.index')
			->with(['penals' => $penals]);
		}
	}

	public function getDatatable()
	{
		$result = DB::table('penals')
		->select(array(
			'penals.id',
			'penals.number_penal as number',
			'penals.start_date as date',
			'penals.acussed as acussed',
			'penals.aggrieved as aggrieved',
			'penals.judge as judge',
			'penals.scribe as scribe'))
		->where('penals.status', '=', 1);

		return Datatable::query($result)
		->searchColumns('penals.number_penal','penals.date','penals.acussed','penals.aggrieved','penals.judge','penals.scribe')
		->orderColumns('id','penals.number_penal')
		->showColumns('id','number','date','acussed','aggrieved','judge','scribe')
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