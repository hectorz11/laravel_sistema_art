<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		DB::table('groups')->delete();

		Sentry::createGroup(array(
			'name' => 'administrador',
			'permissions' => array(
				'admin' => 1,
				'deeds_index' => 1,
				'deeds_create' => 1,
				'deeds_update' => 1,
				'deeds_delete' => 1,
				'agrarians_index' => 1,
				'agrarians_create' => 1,
				'agrarians_update' => 1,
				'agrarians_delete' => 1,
				'civils_index' => 1,
				'civils_create' => 1,
				'civils_update' => 1,
				'civils_delete' => 1,
				'penals_index' => 1,
				'penals_create' => 1,
				'penals_update' => 1,
				'penals_delete' => 1,
				'records_index' => 1,
				'records_create' => 1,
				'records_update' => 1,
				'records_delete' => 1,
				'notaries_index' => 1,
				'notaries_create' => 1,
				'notaries_update' => 1,
				'notaries_delete' => 1,
				'municipalities_index' => 1,
				'municipalities_create' => 1,
				'municipalities_update' => 1,
				'municipalities_delete' => 1,
				'users_index' => 1,
				'users_create' => 1,
				'users_update' => 1,
				'users_delete' => 1,
				'groups_index' => 1,
				'groups_create' => 1,
				'groups_update' => 1,
				'groups_delete' => 1,
				'profiles_index' => 1,
				'profiles_create' => 1,
				'profiles_update' => 1,
				'profiles_delete' => 1,
				'comments_index' => 1,
				'comments_create' => 1,
				'comments_update' => 1,
				'comments_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'director',
			'permissions' => array(
				'admin' => 1,
				'deeds_index' => 1,
				'deeds_create' => 1,
				'deeds_update' => 1,
				'deeds_delete' => 1,
				'agrarians_index' => 1,
				'agrarians_create' => 1,
				'agrarians_update' => 1,
				'agrarians_delete' => 1,
				'civils_index' => 1,
				'civils_create' => 1,
				'civils_update' => 1,
				'civils_delete' => 1,
				'penals_index' => 1,
				'penals_create' => 1,
				'penals_update' => 1,
				'penals_delete' => 1,
				'records_index' => 1,
				'records_create' => 1,
				'records_update' => 1,
				'records_delete' => 1,
				'notaries_index' => 1,
				'notaries_create' => 1,
				'notaries_update' => 1,
				'notaries_delete' => 1,
				'municipalities_index' => 1,
				'municipalities_create' => 1,
				'municipalities_update' => 1,
				'municipalities_delete' => 1,
				'users_index' => 1,
				'users_create' => 1,
				'users_update' => 1,
				'users_delete' => 1,
				'groups_index' => 1,
				'groups_create' => 1,
				'groups_update' => 1,
				'groups_delete' => 1,
				'profiles_index' => 1,
				'profiles_create' => 1,
				'profiles_update' => 1,
				'profiles_delete' => 1,
				'comments_index' => 1,
				'comments_create' => 1,
				'comments_update' => 1,
				'comments_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'secretaria',
			'permissions' => array(
				'admin' => 1,
				'deeds_index' => 1,
				'deeds_create' => 1,
				'deeds_update' => 1,
				'deeds_delete' => 1,
				'agrarians_index' => 1,
				'agrarians_create' => 1,
				'agrarians_update' => 1,
				'agrarians_delete' => 1,
				'civils_index' => 1,
				'civils_create' => 1,
				'civils_update' => 1,
				'civils_delete' => 1,
				'penals_index' => 1,
				'penals_create' => 1,
				'penals_update' => 1,
				'penals_delete' => 1,
				'records_index' => 1,
				'records_create' => 1,
				'records_update' => 1,
				'records_delete' => 1,
				'notaries_index' => 1,
				'notaries_create' => 1,
				'notaries_update' => 1,
				'notaries_delete' => 1,
				'municipalities_index' => 1,
				'municipalities_create' => 1,
				'municipalities_update' => 1,
				'municipalities_delete' => 1,
				'users_index' => 1,
				'users_create' => 1,
				'users_update' => 1,
				'users_delete' => 1,
				'groups_index' => 1,
				'groups_create' => 1,
				'groups_update' => 1,
				'groups_delete' => 1,
				'profiles_update' => 1,
				'comments_index' => 1,
				'comments_create' => 1,
				'comments_update' => 1,
				'comments_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'practicante',
			'permissions' => array(
				'admin' => 1,
				'deeds_index' => 1,
				'deeds_create' => 1,
				'deeds_update' => 1,
				'deeds_delete' => 1,
				'agrarians_index' => 1,
				'agrarians_create' => 1,
				'agrarians_update' => 1,
				'agrarians_delete' => 1,
				'civils_index' => 1,
				'civils_create' => 1,
				'civils_update' => 1,
				'civils_delete' => 1,
				'penals_index' => 1,
				'penals_create' => 1,
				'penals_update' => 1,
				'penals_delete' => 1,
				'records_index' => 1,
				'records_create' => 1,
				'records_update' => 1,
				'records_delete' => 1,
				'notaries_index' => 1,
				'notaries_create' => 1,
				'notaries_update' => 1,
				'notaries_delete' => 1,
				'municipalities_index' => 1,
				'municipalities_create' => 1,
				'municipalities_update' => 1,
				'municipalities_delete' => 1,
				'profiles_update' => 1,
				'comments_index' => 1,
				'comments_create' => 1,
				'comments_update' => 1,
				'comments_delete' => 1,
			)
		));
		Sentry::createGroup(array(
			'name' => 'usuario',
			'permissions' => array(
				'users' => 1,
				'deeds_index' => 1,
				'agrarians_index' => 1,
				'civils_index' => 1,
				'penals_index' => 1,
				'records_index' => 1,
				'notaries_index' => 1,
				'municipalities_index' => 1,
				'profiles_update' => 1,
				'comments_index' => 1,
				'comments_create' => 1,
				'comments_update' => 1,
				'comments_delete' => 1,
			)
		));
	}
}