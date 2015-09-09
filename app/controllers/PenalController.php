<?php

class PenalController extends \BaseController {

	protected $penal = null;

	public function __construct(Penal $penal)
	{
		$this->penal = $penal;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['penal_index'])) {
			if (Request::ajax()) {
				$result = DB::table('penals')
				->select(array(
					'penals.id',
					'penals.number_penal as number',
					'penals.start_date as date',
					'penals.acussed as acussed',
					'penals.aggrieved as aggrieved',
					'penals.judge as judge',
					'penals.scribe as scribe'))
				->where('penals.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('penals.number_penal','penals.date','penals.acussed','penals.aggrieved','penals.judge','penals.scribe')
				->orderColumns('id','penals.number_penal')
				->showColumns('id','number','date','acussed','aggrieved','judge','scribe')
				->addColumn('Operaciones', function($model)
				{
					return "<a href='".URL::route('admin.penals.edit', $model->id)."'>
								<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
							</a>
							<a href='#' id=$model->id data-toggle='modal'>
								<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
							</a>";
				})->make();
			} else {
				return View::make('penals.admin.index');
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['penal_create'])) {
			return View::make('penals.admin.create');
		} else {
			return View::make('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['penal_create'])) {
			$answer = Penal::createPenal(Input::all());
			if ($answer['error'] == true) {
				return Redirect::route('admin.penals.create')
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.penals.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['penal_update'])) {
			$penal = $this->penal->selectPenal($id);
			if (Request::ajax()) {
				return Response::json(['penal' => $penal]);
			} else {
				return View::make('penals.admin.edit', ['penal' => $penal]);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['penal_update'])) {
			$answer = Penal::updatePenal(Input::all(), $id);
			if ($answer['error'] == true) {
				return Redirect::route('admin.penals.edit', $id)
				->withErrors($answer['message'])->withInput();
			} else {
				return Redirect::route('admin.penals.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} else {
			return View::make('pages.error');
		}
	}

	public function postAdminDelete($id)
	{
		//
	}

}