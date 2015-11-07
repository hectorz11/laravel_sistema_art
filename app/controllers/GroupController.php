<?php

class GroupController extends \BaseController {

	/**
	 * admin.groups.index
	 *
	 */
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['groups_index'])) {

			$groups = Sentry::findAllGroups();

			return View::make('groups.admin.index', ['groups' => $groups]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.groups.create
	 *
	 */
	public function getAdminCreate()
	{
		if (Sentry::hasAnyAccess(['groups_create'])) {
			return View::make('groups.admin.create');
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.groups.store
	 *
	 */
	public function postAdminCreate()
	{
		if (Sentry::hasAnyAccess(['groups_create'])) {
			try {
				$group = Sentry::createGroup([
					'name' => Input::get('name'),
					'permissions' => [
						'admin' => Input::get('admin'),
						'deeds_index' => Input::get('deeds_index'),
						'deeds_create' => Input::get('deeds_create'),
						'deeds_update' => Input::get('deeds_update'),
						'deeds_delete' => Input::get('deeds_delete'),
						'agrarians_index' => Input::get('agrarians_index'),
						'agrarians_create' => Input::get('agrarians_create'),
						'agrarians_update' => Input::get('agrarians_update'),
						'agrarians_delete' => Input::get('agrarians_delete'),
						'civils_index' => Input::get('civils_index'),
						'civils_create' => Input::get('civils_create'),
						'civils_update' => Input::get('civils_update'),
						'civils_delete' => Input::get('civils_delete'),
						'penals_index' => Input::get('penals_index'),
						'penals_create' => Input::get('penals_create'),
						'penals_update' => Input::get('penals_update'),
						'penals_delete' => Input::get('penals_delete'),
						'records_index' => Input::get('records_index'),
						'records_create' => Input::get('records_create'),
						'records_update' => Input::get('records_update'),
						'records_delete' => Input::get('records_delete'),
						'notaries_index' => Input::get('notaries_index'),
						'notaries_create' => Input::get('notaries_create'),
						'notaries_update' => Input::get('notaries_update'),
						'notaries_delete' => Input::get('notaries_delete'),
						'municipalities_index' => Input::get('municipalities_index'),
						'municipalities_create' => Input::get('municipalities_create'),
						'municipalities_update' => Input::get('municipalities_update'),
						'municipalities_delete' => Input::get('municipalities_delete'),
						'users_index' => Input::get('users_index'),
						'users_create' => Input::get('users_create'),
						'users_update' => Input::get('users_update'),
						'users_delete' => Input::get('users_delete'),
						'groups_index' => Input::get('groups_index'),
						'groups_create' => Input::get('groups_create'),
						'groups_update' => Input::get('groups_update'),
						'groups_delete' => Input::get('groups_delete'),
					],
				]);
				return Redirect::route('admin.groups.create')
				->with(['message' => 'Grupo creado con exito', 'class' => 'success']);

			} 
			catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
				return Redirect::route('admin.groups.create')
				->with(['message' => 'El nombre es requerido', 'class' => 'warning']);
			} 
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
				return Redirect::route('admin.groups.create')
				->with(['message' => 'El grupo ya existe', 'class' => 'warning']);
			}
		}
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.groups.edit
	 *
	 */
	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['groups_update'])) {
			
			$group = sentry::findGroupById($id);

			return View::make('groups.admin.update', ['group' => $group]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	/**
	 * admin.groups.update
	 *
	 */
	public function putAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['groups_update'])) {
			try {
				$group = Sentry::findGroupById($id);
				$group->name = Input::get('name');
				$group->permissions = [
				'admin' => Input::get('admin'),
					'deeds_index' => Input::get('deeds_index'),
					'deeds_create' => Input::get('deeds_create'),
					'deeds_update' => Input::get('deeds_update'),
					'deeds_delete' => Input::get('deeds_delete'),
					'agrarians_index' => Input::get('agrarians_index'),
					'agrarians_create' => Input::get('agrarians_create'),
					'agrarians_update' => Input::get('agrarians_update'),
					'agrarians_delete' => Input::get('agrarians_delete'),
					'civils_index' => Input::get('civils_index'),
					'civils_create' => Input::get('civils_create'),
					'civils_update' => Input::get('civils_update'),
					'civils_delete' => Input::get('civils_delete'),
					'penals_index' => Input::get('penals_index'),
					'penals_create' => Input::get('penals_create'),
					'penals_update' => Input::get('penals_update'),
					'penals_delete' => Input::get('penals_delete'),
					'records_index' => Input::get('records_index'),
					'records_create' => Input::get('records_create'),
					'records_update' => Input::get('records_update'),
					'records_delete' => Input::get('records_delete'),
					'notaries_index' => Input::get('notaries_index'),
					'notaries_create' => Input::get('notaries_create'),
					'notaries_update' => Input::get('notaries_update'),
					'notaries_delete' => Input::get('notaries_delete'),
					'municipalities_index' => Input::get('municipalities_index'),
					'municipalities_create' => Input::get('municipalities_create'),
					'municipalities_update' => Input::get('municipalities_update'),
					'municipalities_delete' => Input::get('municipalities_delete'),
					'users_index' => Input::get('users_index'),
					'users_create' => Input::get('users_create'),
					'users_update' => Input::get('users_update'),
					'users_delete' => Input::get('users_delete'),
					'groups_index' => Input::get('groups_index'),
					'groups_create' => Input::get('groups_create'),
					'groups_update' => Input::get('groups_update'),
					'groups_delete' => Input::get('groups_delete'),
				];
				$group->save();

				return Redirect::route('admin.groups.edit', $id)
				->with(['message' => 'El grupo fue actualizado con exito!', 'class' => 'success']);		
			} 
			catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
				return Redirect::route('admin.groups.edit', $id)
				->with(['message' => 'El nombre es requerido', 'class' => 'warning']);
			} 
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
				return Redirect::route('admin.groups.edit', $id)
				->with(['message' => 'El grupo ya existe', 'class' => 'warning']);
			} 
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
				return Redirect::route('admin.groups.edit', $id)
				->with(['message' => 'El grupo no fue encontrado.', 'class' => 'danger']);
			}
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

}