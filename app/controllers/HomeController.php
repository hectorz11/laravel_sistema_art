<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		return View::make('pages.home');
	}

	public function getSignIn()
	{
		return View::make('pages.sign_in');
	}

	public function postSignIn()
	{
		$validation = Validator::make(Input::all(), User::$login_rules);
		if($validation->fails()) {
			return Redirect::route('/')->withInput();
		} else {
			try {
				$credenciales = array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
				);
				$sentry = Sentry::authenticate($credenciales, false);
				if(Sentry::check()) {

					if($sentry->hasAnyAccess(['admin'])) {
						return Redirect::route('admin_dashboard')
						->with(['message' => $sentry->first_name.' '.$sentry->last_name, 'class' => 'info']);
					} else if($sentry->hasAnyAccess(['user'])) {
						return Redirect::route('home');
					}
				} else {
					return Redirect::route('/')->withInput();
				}
			} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
		     	return Redirect::route('home')->withInput();
			} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		    	return Redirect::route('home')->withInput();
			}
		}
	}

	public function getSignOut()
	{
		Sentry::logout();
		return Redirect::route('home');
	}
}
