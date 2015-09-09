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
			/*$deeds = DB::table('deeds')
			->select(array(
				'deeds.id',
				'notaries.name as name',
				'deeds.number_deeds as number_deeds',
				'deeds.protocol as protocol',
				'deeds.folio as folio',
				'deeds.given_by as given_by',
				'deeds.pro as pro'))
			->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
			->where('deeds.status', '=', 1)->paginate(5);*/
			//$deeds = $this->deed->allDeeds();
			if (Request::ajax()) {
				//return Response::json(View::make('deeds.admin.posts', ['deeds' => $deeds])->render());
				//return Response::json(['deeds' => $deeds]);
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
					return "<a href='".URL::route('admin.deeds.edit', $model->id)."'>
								<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
							</a>
							<a href='#' id=$model->id data-toggle='modal'>
								<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
							</a>";
				})->make();
			} else {
				return View::make('deeds.admin.index');
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['deed_create'])) {
			$notaries = $this->notary->allNotaries();
			return View::make('deeds.admin.create', ['notaries' => $notaries]);
		} else {
			return View::make('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['deed_create'])) {
			$answer = Deed::createDeed(Input::all());
			if ($answer['error'] == true) {
				return Redirect::route('admin.deeds.create')
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.deeds.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['deed_update'])) {
			$notaries = $this->notary->allNotaries();
			$deed = $this->deed->selectDeed($id);
			if (Request::ajax()) {
				return Response::json(['deed' => $deed, 'notaries' => $notaries]);
			} else {
				return View::make('deeds.admin.edit', ['deed' => $deed, 'notaries' => $notaries]);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['deed_update'])) {
			$answer = Deed::updateDeed(Input::all(), $id);
			if ($answer['error'] == true) {
				return Redirect::route('admin.deeds.edit', $id)
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.deeds.edit', $id)
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