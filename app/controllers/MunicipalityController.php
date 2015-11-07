<?php

class MunicipalityController extends \BaseController {

	/**
	 * Atributos de MunicipalityController
	 *
	 */
	protected $municipality = null;

	/**
	 * Metodos de MunicipalityController
	 *
	 */
	public function __construct(Municipality $municipality)
	{
		$this->municipality = $municipality;
	}

	/**
	 * admin.municipalities.index
	 *
	 */
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

	/**
	 * admin.municipalities.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['municipalities_create'])) {
			return View::make('municipalities.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.municipalities.edit
	 *
	 */
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

	/**
	 * admin.municipalities.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['municipalities_create'])) {

			$answer = $this->municipality->createMunicipality(Input::all());

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

	/**
	 * admin.municipalities.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['municipalities_update'])) {

			$answer = $this->municipality->updateMunicipality(Input::all(), $id);

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