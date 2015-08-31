<?php

class CivilController extends \BaseController {

	protected $civil = null;

	public function __construct(Civil $civil)
	{
		$this->civil = $civil;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['civil_index'])) {
			$civils = $this->civil->allCivils();
			//return Response::json($civils);
			return View::make('civils.admin.index')
			->with(['civils' => $civils]);
		}
	}

	public function getDatatable()
	{
		$result = DB::table('civils')
		->select(array(
			'civils.id',
			'civils.number_civil as number',
			'civils.date as date',
			'civils.demandant as demandant',
			'civils.defendant as defendant',
			'civils.secretary as secretary',
			'civils.matery as matery'))
		->where('civils.status', '=', 1);

		return Datatable::query($result)
		->searchColumns('civils.number_civil','civils.date','civils.demandant','civils.defendant','civils.secretary','civils.matery')
		->orderColumns('id','civils.number_civil')
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
		return View::make('civils.admin.create');
	}

	public function postAdminCreate()
	{
		//
	}

	public function getAdminUpdate($id)
	{
		return View::make('civils.admin.update');
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