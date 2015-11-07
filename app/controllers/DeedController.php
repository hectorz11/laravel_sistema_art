<?php

class DeedController extends \BaseController {

	/**
	 * Atributos de DeedController
	 *
	 */
	protected $deed = null;
	protected $notary = null;

	/**
	 * Metodos de DeedController
	 *
	 */
	public function __construct(Deed $deed, Notary $notary)
	{
		$this->deed = $deed;
		$this->notary = $notary;
	}

	/*
	!------------------------------------------------------------------------------
	! Rol ADMIN (administrador)
	!------------------------------------------------------------------------------
	!
	*/
	/**
	 * admin.deeds.index
	 *
	 */
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['deeds_index'])) {

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
					'deeds.pro as pro',
					'deeds.created_at as created'))
				->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
				->where('deeds.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('name','number_deeds','protocol','given_by','pro')
				->orderColumns('created','id','number_deeds')
				->showColumns('id','name','number','protocol','folio','given','pro')
				->addColumn('Operaciones', function($model) {
					return "<a href='".URL::route('admin.deeds.edit', $model->id)."'>
								<span class='label label-primary'><i class='fa fa-edit'></i> Editar</span>
							</a>
							<a class='delete' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else {
				return View::make('deeds.admin.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.deeds.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['deeds_create'])) {

			$notaries = $this->notary->allNotariesActivated();

			return View::make('deeds.admin.create', ['notaries' => $notaries]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.deeds.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['deeds_update'])) {

			$notaries = $this->notary->allNotariesActivated();
			$deed = $this->deed->selectDeed($id);

			if (Request::ajax()) {
				return Response::json(['deed' => $deed, 'notaries' => $notaries]);
			}
			else {
				return View::make('deeds.admin.edit', ['deed' => $deed, 'notaries' => $notaries]);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.deeds.modal.data
	 *
	 */
	public function getAdminModalData()
	{
		if (Input::has('deeds')) {

			$idDeed = Input::get('deeds');
			$deed = $this->deed->selectDeed($idDeed);
			$data = array(
				'success' => true,// indica que se llevo la peticion acabo
				'idDeed' => $deed->id,
				'numberDeeds' => $deed->number_deeds,
			);

			return Response::json($data);
		}
	}

	/**
	 * admin.deeds.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['deeds_create'])) {

			$answer = $this->deed->createDeed(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.deeds.create')
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.deeds.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.deeds.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['deeds_update'])) {

			$answer = $this->deed->updateDeed(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.deeds.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.deeds.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.deeds.delete
	 *
	 */
	public function deleteAdminDelete($id)
	{
		if (Sentry::hasAnyAccess(['deeds_delete'])) {

			$idDeed = Input::get('idDeed');
			$deed = $this->deed->selectDeed($idDeed);
			$deed->status = 0;
			$deed->save();

			return Redirect::route('admin.deeds.index')
			->with(['message' => 'Eliminado con exito!', 'class' => 'success']);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/*
	!------------------------------------------------------------------------------
	! Rol USER (usuario)
	!------------------------------------------------------------------------------
	!
	*/
	/**
	 * users.deeds.index
	 *
	 */
	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['users'])) {

			if (Request::ajax()) {

				$result = DB::table('deeds')
				->select(array(
					'deeds.id',
					'notaries.name as name',
					'deeds.number_deeds as number',
					'deeds.protocol as protocol',
					'deeds.folio as folio',
					'deeds.given_by as given',
					'deeds.pro as pro',
					'deeds.created_at as created'))
				->join('notaries', 'deeds.notary_id', '=', 'notaries.id')
				->where('deeds.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('name','number_deeds','protocol','given_by','pro')
				->orderColumns('created','id','number_deeds')
				->showColumns('id','name','number','protocol','folio','given','pro')
				->make();
			} 
			else {
				return View::make('deeds.user.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}
}