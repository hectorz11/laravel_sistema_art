<?php

class DeedController extends \BaseController {

	protected $deed = null;
	protected $notary = null;

	public function __construct(Deed $deed, Notary $notary)
	{
		$this->deed = $deed;
		$this->notary = $notary;
	}

	public function index()
	{
		$deeds = $this->deed->allDeeds();
		return Response::json(['deeds' => $deeds]);
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['deed_index'])) {
			$deeds = $this->deed->allDeeds();
			$notaries = $this->notary->allNotaries();
			//return Response::json(['deeds' => $deeds, 'notaries' => $notaries]);
			return View::make('deeds.admin.index');
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