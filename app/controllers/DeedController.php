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
			$deeds = DB::table('deeds')
			->select(array(
				'deeds.id',
				'notaries.name as name',
				'deeds.number_deeds as number_deeds',
				'deeds.protocol as protocol',
				'deeds.folio as folio',
				'deeds.given_by as given_by',
				'deeds.pro as pro'))
			->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
			->where('deeds.status', '=', 1)->paginate(5);
			//$deeds = $this->deed->allDeeds();
			if (Request::ajax()) {
				return Response::json(View::make('deeds.admin.posts', ['deeds' => $deeds])->render());
				//return Response::json(['deeds' => $deeds]);
			} else {
				return View::make('deeds.admin.index', ['deeds' => $deeds]);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getDatatable()
	{
		$result = DB::table('deeds')
		->select(array(
			'deeds.id',
			'notaries.name as name',
			'deeds.number_deeds as number',
			'deeds.protocol as protocol',
			'deeds.folio as folio',
			'deeds.given_by as given',
			'deeds.pro as pro'))
		->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
		->where('deeds.status', '=', 1);

		return Datatable::query($result)
		->searchColumns('notaries.name','deeds.number_deeds','deeds.protocol','deeds.given_by','deeds.pro')
		->orderColumns('id','deeds.number_deeds')
		->showColumns('id','name','number','protocol','folio','given','pro')
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
<<<<<<< HEAD
		$deeds = $this->deed->allDeeds();
		$notaries = $this->notary->allNotaries();
		if (Request::ajax()) {
			return Response::json(['deeds' => $deeds, 'notaries' => $notaries]);
		}
		return View::make('deeds.admin.edit');
=======
		if (Sentry::hasAnyAccess(['deed_update'])) {
			$deed = $this->deed->selectDeed($id);
			if (Request::ajax()) {
				return Response::json(['deed' => $deed]);
			} else {
				return View::make('deeds.admin.edit', ['deed' => $deed]);
			}
		} else {
			return View::make('pages.error');
		}
>>>>>>> 9c072125118d19e0196e7ed510a2d7d41497cdca
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