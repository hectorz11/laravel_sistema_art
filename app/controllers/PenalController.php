<?php

class PenalController extends \BaseController {

	protected $penal = null;

	public function __construct(Penal $penal)
	{
		$this->penal = $penal;
	}

	/*
	!------------------------------------------------------------------------------
	! Rol ADMIN (administrador)
	!------------------------------------------------------------------------------
	!
	*/
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['penals_index'])) {

			if (Request::ajax()) {

				$result = DB::table('penals')
				->select(array(
					'penals.id',
					'penals.number_penal as number',
					'penals.start_date as date',
					'penals.acussed as acussed',
					'penals.aggrieved as aggrieved',
					'penals.judge as judge',
					'penals.scribe as scribe',
					'penals.created_at as created'))
				->where('penals.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_penal','date','acussed','aggrieved','judge','scribe')
				->orderColumns('created','id','number_penal')
				->showColumns('id','number','date','acussed','aggrieved','judge','scribe')
				->addColumn('Operaciones', function($model) {
					return "<a href='".URL::route('admin.penals.edit', $model->id)."'>
								<span class='label label-primary'><i class='fa fa-edit'></i> Editar</span>
							</a>
							<a class='delete' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else {
				return View::make('penals.admin.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['penals_create'])) {
			return View::make('penals.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['penals_update'])) {

			$penal = $this->penal->selectPenal($id);

			if (Request::ajax()) {
				return Response::json(['penal' => $penal]);
			}
			else {
				return View::make('penals.admin.edit', ['penal' => $penal]);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminModalData()
	{
		if (Input::has('penals')) {

			$idPenal = Input::get('penals');
			$penal = $this->penal->selectPenal($idPenal);
			$data = array(
				'success' => true,// indica que se llevo la peticion acabo
				'idPenal' => $penal->id,
				'numberPenal' => $penal->number_penal,
			);

			return Response::json($data);
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['penals_create'])) {

			$answer = Penal::createPenal(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.penals.create')
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.penals.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['penals_update'])) {

			$answer = Penal::updatePenal(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.penals.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.penals.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function deleteAdminDelete($id)
	{
		if (Sentry::hasAnyAccess(['penals_delete'])) {

			$idPenal = Input::get('idPenal');
			$penal = Penal::find($idPenal);
			$penal->status = 0;
			$penal->save();

			return Redirect::route('admin.penals.index')
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
	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['users'])) {

			if (Request::ajax()) {

				$result = DB::table('penals')
				->select(array(
					'penals.id',
					'penals.number_penal as number',
					'penals.start_date as date',
					'penals.acussed as acussed',
					'penals.aggrieved as aggrieved',
					'penals.judge as judge',
					'penals.scribe as scribe',
					'penals.created_at as created'))
				->where('penals.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('number_penal','date','acussed','aggrieved','judge','scribe')
				->orderColumns('created','id','number_penal')
				->showColumns('id','number','date','acussed','aggrieved','judge','scribe')
				->make();
			} 
			else {
				return View::make('penals.user.index');
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

}