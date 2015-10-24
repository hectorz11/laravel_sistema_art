<?php

class MunicipalityController extends \BaseController {

	protected $municipality = null;

	public function __construct(Municipality $municipality)
	{
		$this->municipality = $municipality;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['municipalities_index'])) {

			$municipalitiesActivated = $this->municipality->allMunicipalitiesActivated();
			$municipalitiesDisabled = $this->municipality->allMunicipalitiesDisabled();

			return View::make('municipalities.admin.index', ['muni_a' => $municipalitiesActivated, 'muni_d' => $municipalitiesDisabled]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['municipalities_create'])) {
			return View::make('municipalities.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['municipalities_update'])) {

			$municipality = $this->municipality->selectMunicipality($id);

			if (Request::ajax()) {
				return Response::json(['municipality' => $municipality]);
			}
			else {
				return View::make('municipalities.admin.edit', ['municipality' => $municipality]);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['municipalities_create'])) {

			$answer = Municipality::createMunicipality(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.municipalities.create')
				->withErrors($answer['message'])->withInput();
			} 
			else {
				return Redirect::route('admin.municipalities.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['municipalities_update'])) {

			$answer = Municipality::updateMunicipality(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.municipalities.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.municipalities.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function deleteAdminDelete($id)
	{
		//
	}

}