<?php

class AgrarianController extends \BaseController {

	/**
	 * Atributos de AgrarianController
	 *
	 */
	protected $agrarian = null;

	/**
	 * Metodos de AgrarianController
	 *
	 */
	public function __construct(Agrarian $agrarian)
	{
		$this->agrarian = $agrarian;
	}

	/*
	!------------------------------------------------------------------------------
	! Rol ADMIN (administrador)
	!------------------------------------------------------------------------------
	!
	*/
	/**
	 * admin.agrarians.index
	 *
	 */
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['agrarians_index'])) {

			if (Request::ajax()) {

				$result = DB::table('agrarians')
				->select(array(
					'agrarians.id',
					'agrarians.number_agrarian as number',
					'agrarians.date as date',
					'agrarians.demandant as demandant',
					'agrarians.defendant as defendant',
					'agrarians.secretary as secretary',
					'agrarians.matery as matery',
					'agrarians.created_at as created'))
				->where('agrarians.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_agrarian','date','demandant','defendant','secretary','matery')
				->orderColumns('created','id','number_agrarian')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->addColumn('Operaciones', function($model) {
					return "<a href='".URL::route('admin.agrarians.edit', $model->id)."'>
								<span class='label label-primary'><i class='fa fa-edit'></i> Editar</span>
							</a>
							<a class='delete' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else {
				return View::make('agrarians.admin.index'); 
			}
		} 
		else {
			return Redirect::route('pages.error'); 
		}
	}

	/**
	 * admin.agrarians.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['agrarians_create'])) {
			return View::make('agrarians.admin.create');
		}
		else { 
			return Redirect::route('pages.error'); 
		}
	}

	/**
	 * admin.agrarians.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['agrarians_update'])) {

			$agrarian = $this->agrarian->selectAgrarian($id);

			if (Request::ajax()) {
				return Response::json(['agrarian' => $agrarian]);
			}
			else {
				return View::make('agrarians.admin.edit', ['agrarian' => $agrarian]);
			}
		} 
		else { 
			return Redirect::route('pages.error'); 
		}
	}

	/**
	 * admin.agrarians.modal.data
	 *
	 */
	public function getAdminModalData()
	{
		if (Input::has('agrarians')) {

			$idAgrarian = Input::get('agrarians');
			$agrarian = $this->agrarian->selectAgrarian($idAgrarian);
			$data = array(
				'success' => true,// indica que se llevo la peticion acabo
				'idAgrarian' => $agrarian->id,
				'numberAgrarian' => $agrarian->number_agrarian,
			);

			return Response::json($data);
		}
	}

	/**
	 * admin.agrarians.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['agrarians_create'])) {

			$answer = $this->agrarian->createAgrarian(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.agrarians.create')
				->withErrors($answer['message'])->withInput();
			} 
			else {
				return Redirect::route('admin.agrarians.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else { 
			return Redirect::route('pages.error'); 
		}
	}

	/**
	 * admin.agrarians.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['agrarians_update'])) {

			$answer = $this->agrarian->updateAgrarian(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.agrarians.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.agrarians.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else { 
			return Redirect::route('pages.error'); 
		}
	}

	/**
	 * admin.agrarians.delete
	 *
	 */
	public function deleteAdminDelete($id)
	{
		if (Sentry::hasAnyAccess(['agrarians_delete'])) {

			$idAgrarian = Input::get('idAgrarian');
			$agrarian = $this->agrarian->selectAgrarian($idAgrarian);
			$agrarian->status = 0;
			$agrarian->save();

			return Redirect::route('admin.agrarians.index')
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
	 * users.agrarians.indez
	 *
	 */
	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['users'])) {
			
			if (Request::ajax()) {

				$result = DB::table('agrarians')
				->select(array(
					'agrarians.id',
					'agrarians.number_agrarian as number',
					'agrarians.date as date',
					'agrarians.demandant as demandant',
					'agrarians.defendant as defendant',
					'agrarians.secretary as secretary',
					'agrarians.matery as matery',
					'agrarians.created_at as created'))
				->where('agrarians.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_agrarian','date','demandant','defendant','secretary','matery')
				->orderColumns('created','id','number_agrarian')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->make();
			}
			else {
				return View::make('agrarians.user.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

}