<?php

class ProfileController extends \BaseController {

	public function getAdminUpdate($id)
	{
		if (Sentry::hasAnyAccess(['users_update'])) {
			$user = User::find($id);

			return View::make('pages.admin.profile', ['user' => $user]);
		} else {
			return View::make('pages.error');
		}
	}

}