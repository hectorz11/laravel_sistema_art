<?php

class CivilController extends \BaseController {

	/**
	 * Atributos de CivilController
	 *
	 */
	protected $civil = null;

	/**
	 * Metodos de CivilController
	 *
	 */
	public function __construct(Civil $civil)
	{
		$this->civil = $civil;
	}

	/*
	!------------------------------------------------------------------------------
	! Rol ADMIN (administrador)
	!------------------------------------------------------------------------------
	!
	*/
	/**
	 * admin.civils.index
	 *
	 */
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['civils_index'])) {

			if (Request::ajax()) {

				$result = DB::table('civils')
				->select(array(
					'civils.id',
					'civils.number_civil as number',
					'civils.date as date',
					'civils.demandant as demandant',
					'civils.defendant as defendant',
					'civils.secretary as secretary',
					'civils.matery as matery',
					'civils.created_at as created'))
				->where('civils.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_civil','date','demandant','defendant','secretary','matery')
				->orderColumns('created','id','number_civil')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->addColumn('Operaciones', function($model) {
					return "<a href='".URL::route('admin.civils.edit', $model->id)."'>
								<span class='label label-primary'><i class='fa fa-edit'></i> Editar</span>
							</a>
							<a class='delete' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else {
				return View::make('civils.admin.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.civils.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['civils_create'])) {
			return View::make('civils.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.civils.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['civils_update'])) {

			$civil = $this->civil->selectCivil($id);

			if (Request::ajax()) {
				return Response::json(['civil' => $civil]);
			}
			else {
				return View::make('civils.admin.edit', ['civil' => $civil]);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.civils.modal.data
	 *
	 */
	public function getAdminModalData()
	{
		if (Input::has('civils')) {

			$idCivil = Input::get('civils');
			$civil = $this->civil->selectCivil($idCivil);
			$data = array(
				'success' => true,// indica que se llevo la peticion acabo
				'idCivil' => $civil->id,
				'numberCivil' => $civil->number_civil,
			);

			return Response::json($data);
		}
	}

	/**
	 * admin.civils.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['civils_create'])) {

			$answer = $this->civil->createCivil(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.civils.create')
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.civils.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.civils.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['civils_update'])) {

			$answer = $this->civil->updateCivil(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.civils.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.civils.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.civils.delete
	 *
	 */
	public function deleteAdminDelete($id)
	{
		if (Sentry::hasAnyAccess(['civils_delete'])) {

			$idCivil = Input::get('idCivil');
			$civil = $this->civil->selectCivil($idCivil);
			$civil->status = 0;
			$civil->save();

			return Redirect::route('admin.civils.index')
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
	 * admin.users.index
	 *
	 */
	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['users'])) {

			if (Request::ajax()) {
				
				$result = DB::table('civils')
				->select(array(
					'civils.id',
					'civils.number_civil as number',
					'civils.date as date',
					'civils.demandant as demandant',
					'civils.defendant as defendant',
					'civils.secretary as secretary',
					'civils.matery as matery',
					'civils.created_at as created'))
				->where('civils.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_civil','date','demandant','defendant','secretary','matery')
				->orderColumns('created','id','number_civil')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->make();
			} 
			else {
				return View::make('civils.user.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

}