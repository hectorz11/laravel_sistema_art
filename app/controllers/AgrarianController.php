<?php

class AgrarianController extends \BaseController {

	protected $agrarian = null;

	public function __construct(Agrarian $agrarian)
	{
		$this->agrarian = $agrarian;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['agrarian_index'])) {
			$agrarians = $this->agrarian->allAgrarians();
			//return Response::json($agrarians);
			return View::make('agrarians.admin.index')
			->with(['agrarians' => $agrarians]);
		}
	}

	public function getDatatable()
	{
		$result = DB::table('agrarians')
		->select(array(
			'agrarians.id',
			'agrarians.number_agrarian as number',
			'agrarians.date as date',
			'agrarians.demandant as demandant',
			'agrarians.defendant as defendant',
			'agrarians.secretary as secretary',
			'agrarians.matery as matery'))
		->where('agrarians.status', '=', 1);

		return Datatable::query($result)
		->searchColumns('agrarians.number_agrarian','agrarians.date','agrarians.demandant','agrarians.defendant','agrarians.secretary','agrarians.matery')
		->orderColumns('id','agrarians.number_agrarian')
		->showColumns('id','number','date','demandant','defendant','secretary','matery')
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
		return View::make('agrarians.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('agrarians.admin.update');
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