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

	protected $user = null;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		$users = $this->user->allUsers();
		return View::make('pages.guest.home', ['users' => $users]);
	}

	public function getSignIn()
	{
		return View::make('pages.sign_in');
	}

	public function postSignIn()
	{
		try {
			$credenciales = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			$sentry = Sentry::authenticate($credenciales, false);
			if(Sentry::check()) {
				if($sentry->hasAnyAccess(['admin'])) {
					return Redirect::route('admin.dashboard')
					->with(['message' => $sentry->first_name.' '.$sentry->last_name, 'class' => 'info']);
				} else if($sentry->hasAnyAccess(['users'])) {
					return Redirect::route('user.dashboard');
				}
			} else {
				return Redirect::route('home')->withInput();
			}
		} catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			return Redirect::route('signin')
			->with(['message' => 'E-mail es requerido', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Password es requerido', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Contraseña incorrecta', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Usuario no registrado', 'class' => 'danger']);
		} catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Usuario no activado', 'class' => 'warning']);
	    }
	}

	public function getSignOut()
	{
		Sentry::logout();
		return Redirect::route('home');
	}

	public function postSignUp()
	{
		$answer = User::createUser(Input::all());
		if ($answer['error'] == true) {
			return Redirect::route('home');
		} else {
			$user = $answer['data'];
			$data['activationCode'] = $user->GetActivationCode();
			$data['email'] = $user->email;
			$data['userId'] = $user->getId();
			$data['password'] = Input::get('password');

			Mail::send('emails.auth.activated', $data, function($m) use ($data) {
				$m->to($data['email'])->subject('Gracias por registrarse - Support Team ART');
			});

			return Redirect::route('signin');
		}
	}

	public function getRegisterActivated($userId, $activationCode)
	{
		$user = Sentry::findUserById($userId);
		if($user->attemptActivation($activationCode)) {
			return Redirect::route('signin')
			->with('message', 'La activación de usuario fue un éxito, porfavor ingresa arriba.')
			->with('class', 'success');
		} else {
			return Redirect::route('signin')
			->with('message', 'No se puede activar el usuario inténtalo de nuevo más tarde o póngase en contacto con equipo de apoyo.')
			->with('class', 'danger');
		}
	}
}
