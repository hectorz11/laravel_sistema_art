<?php

class AgrarianController extends \BaseController {

	protected $agrarian = null;

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
					'agrarians.matery as matery'))
				->where('agrarians.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('agrarians.number_agrarian','agrarians.date','agrarians.demandant','agrarians.defendant','agrarians.secretary','agrarians.matery')
				->orderColumns('id','agrarians.number_agrarian')
				->showColumns('id','number','date','demandant','defendant','secretary','matery')
				->addColumn('Operaciones', function($model)
				{
					return "<a href='".URL::route('admin.agrarians.edit', $model->id)."'>
								<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
							</a>
							<a href='#' id=$model->id data-toggle='modal'>
								<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
							</a>";
				})->make();
			} else {
				return View::make('agrarians.admin.index');
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['agrarians_create'])) {
			return View::make('agrarians.admin.create');
		} else {
			return View::make('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['agrarians_create'])) {
			$answer = Agrarian::createAgrarian(Input::all());
			if ($answer['error'] == true) {
				return Redirect::route('admin.agrarians.create')
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.agrarians.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['agrarians_update'])) {
			$agrarian = $this->agrarian->selectAgrarian($id);
			if (Request::ajax()) {
				return Response::json(['agrarian' => $agrarian]);
			} else {
				return View::make('agrarians.admin.edit', ['agrarian' => $agrarian]);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['agrarians_update'])) {
			$answer = Agrarian::updateAgrarian(Input::all(), $id);
			if ($answer['error'] == true) {
				return Redirect::route('admin.agrarians.edit', $id)
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.agrarians.edit', $id)
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
					return "";
				})->make();
			} else {
				return View::make('agrarians.user.index');
			}
		} else {
			return View::make('pages.error');
		}
	}

}