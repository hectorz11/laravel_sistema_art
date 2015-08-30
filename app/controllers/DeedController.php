<?php

class DeedController extends \BaseController {

	protected $deed = null;
	protected $notary = null;

	public function __construct(Deed $deed, Notary $notary)
	{
		$this->deed = $deed;
		$this->notary = $notary;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['deed_index'])) {
			$deed = $this->deed->allDeeds();
			//return Response::json($deed);
			$notaries = $this->notary->allNotaries();
			$deeds = $this->deed->allDeeds();
			return View::make('deeds.admin.index')
			->with(['deeds' => $deeds, 'notaries' => $notaries]);
		}
	}

	public function getDatatable()
	{
		$result = DB::table('deeds')
		->select(array(
			'notaries.name as n',
			'deeds.number_deeds as nd',
			'deeds.protocol as p',
			'deeds.folio as f',
			'deeds.given_by as gb',
			'deeds.pro as pr'))
		->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
		->where('status', '=', 1);

		return Datatable::query($result)
		->searchColumns('notaries.name','deeds.number_deeds','deeds.protocol','deeds.given_by','deeds.pro')
		->orderColumns('id')
		->showColumns('id','n','nd','p','f','gb','pr')
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