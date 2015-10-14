<?php

class CivilController extends \BaseController {

	protected $civil = null;

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
					'civils.matery as matery'))
				->where('civils.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('civils.number_civil','civils.date','civils.demandant','civils.defendant','civils.secretary','civils.matery')
				->orderColumns('id','civils.number_civil')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->addColumn('Operaciones', function($model)
				{
					return "<a href='".URL::route('admin.civils.edit', $model->id)."'>
								<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
							</a>
							<a href='#' id=$model->id data-toggle='modal'>
								<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
							</a>";
				})->make();
			} else {
				return View::make('civils.admin.index');
			}
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['civils_create'])) {
			return View::make('civils.admin.create');
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['civils_create'])) {
			$answer = Civil::createCivil(Input::all());
			if ($answer['error'] == true) {
				return Redirect::route('admin.civils.create')
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.civils.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['civils_update'])) {
			$civil = $this->civil->selectCivil($id);
			if (Request::ajax()) {
				return Response::json(['civil' => $civil]);
			} else {
				return View::make('civils.admin.edit', ['civil' => $civil]);
			}
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['civils_update'])) {
			$answer = Civil::updateCivil(Input::all(), $id);
			if ($answer['error'] == true) {
				return Redirect::route('admin.civils.edit', $id)
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.civils.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function deleteAdminDelete($id)
	{
		//
	}
	
	/*
	!------------------------------------------------------------------------------
	! Rol USER (usuario)
	!------------------------------------------------------------------------------
	!
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
					'civils.matery as matery'))
				->where('civils.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('civils.number_civil','civils.date','civils.demandant','civils.defendant','civils.secretary','civils.matery')
				->orderColumns('id','civils.number_civil')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->addColumn('Operaciones', function($model)
				{
					return "";
				})->make();
			} else {
				return View::make('civils.user.index');
			}
		} else {
			return Redirect::route('pages.error');
		}
	}

}