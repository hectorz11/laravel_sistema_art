<?php

class NotaryController extends \BaseController {

	/**
	 * Atributos de NotaryController
	 *
	 */
	protected $notary = null;

	/**
	 * Metodos de NotaryController
	 *
	 */
	public function __construct(Notary $notary)
	{
		$this->notary = $notary;
	}

	/**
	 * admin.notaries.index
	 *
	 */
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['notaries_index'])) {

			$notariesActivated = $this->notary->allnotariesActivated();
			$notariesDisabled = $this->notary->allnotariesDisabled();

			return View::make('notaries.admin.index', ['not_a' => $notariesActivated, 'not_d' => $notariesDisabled]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.notaries.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['notaries_create'])) {
			return View::make('notaries.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.notaries.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['notaries_update'])) {

			$notary = $this->notary->selectNotary($id);

			if (Request::ajax()) {
				return Response::json(['notary' => $notary]);
			}
			else {
				return View::make('notaries.admin.edit', ['notary' => $notary]);
			}
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.notaries.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['notaries_create'])) {

			$answer = $this->notary->createNotary(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('admin.notaries.create')
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.notaries.index')
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.notaries.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['notaries_update'])) {

			$answer = $this->notary->updateNotary(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('admin.notaries.edit', $id)
				->withErrors($answer['message'])->withInput();
			}
			else {
				return Redirect::route('admin.notaries.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function postAdminDelete($id)
	{
		//
	}

}