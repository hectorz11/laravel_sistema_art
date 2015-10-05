<?php

require 'vendor/autoload.php';
use Carbon\Carbon;

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
		return View::make('pages.guest.sign_in');
	}

	public function postSignIn()
	{
		try {
			$credenciales = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			$sentry = Sentry::authenticate($credenciales, false);
			$user = User::find($sentry->id);
			if (!$user->tokens()->where('client', BrowserDetect::toString())->first()) {
				$token = [];
				$token['api_token'] = hash('sha256', Str::random(10), false);
				$token['client'] = BrowserDetect::toString();
				$token['expires_on'] = Carbon::now()->addMonth()->toDateTimeString();
				$user->tokens()->save(new Token($token));
			}

			if (Sentry::check()) {
				if($sentry->hasAnyAccess(['admin'])) {
					//return Response::json(['token' => $token, 'user' => $sentry->toArray()]);
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

	public function getSignUp()
	{
		return View::make('pages.guest.sign_up');
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
		if ($user->attemptActivation($activationCode)) {
			return Redirect::route('signin')
			->with('message', 'La activación de usuario fue un éxito, porfavor ingresa arriba.')
			->with('class', 'success');
		} else {
			return Redirect::route('signin')
			->with('message', 'No se puede activar el usuario inténtalo de nuevo más tarde o póngase en contacto con equipo de apoyo.')
			->with('class', 'danger');
		}
	}

	public function getForgotPassword()
	{
		return View::make('pages.guest.forgot_password');
	}

	public function postForgotPassword()
	{
		if (Input::has('email')) {
			try {
				$email = Input::get('email');
				$sentry = Sentry::findUserByLogin($email);
				$resetCode = $sentry->getResetPasswordCode();
				$user = User::find($sentry->id);

				Mail::send("emails.reset_password", array('email' => $email, 'resetCode' => $resetCode),
					function($message) use ($email, $resetCode) {
						$message->to($email)->subject('Siga el enlace para restablecer tu contraseña');
					}
				);
				return Redirect::route('forgot.password')
				->with('mensaje', 'Hemos enviado un enlace a su cuenta de correo electrónico por favor, siga a restablecer su contraseña.')
				->with('class', 'success');

			} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::route('forgot.password')
				->with(['mensaje' => 'Usuario no encontrado', 'class' => 'info']);
			}
		} else {
			return Redirect::route('forgot.password')
			->with(['mensaje' => 'TEAM ART: Error email', 'class' => 'danger');
		}
	}

	public function getNewPassword()
	{
		if(Input::has('email') && Input::has('resetcode')) {
			try {
				$user = Sentry::findUserByLogin(Input::get('email'));
				if($user->checkResetPasswordCode(Input::get('resetcode'))) {
					return View::make('pages.guest.new_password')
					->with('user', $user);
				} else {
					return Redirect::route('forgot.password')
					->with('mensaje', 'Solicitud no válida. Introduzca DNI para restablecer su contraseña.')
					->with('class', 'danger');
				}
			} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return Redirect::route('forgot.password')
                ->with('mensaje', 'Usuario no encontrado')->with('class', 'danger');
            }
		} else {
			return Redirect::route('forgot.password')
            ->with('mensaje', 'Solicitud no válida. Introduzca correo electrónico para restablecer su contraseña')
            ->with('class', 'danger');
		}
	}

	public function postNewPassword()
	{
		$rules = array(
			'password' => 'required|min:6|max:32',
			're_password' => 'required|min:6|max:32|same:password'
		);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->passes()) {
			if(Input::has('email') && Input::get('resetcode')) {
				try {
					$user = Sentry::findUserByLogin(Input::get('email'));
					if($user->checkResetPasswordCode(Input::get('resetcode'))) {
						if($user->attemptResetPassword(Input::get('resetcode'), Input::get('password'))) {
							return Redirect::route('signin')
							->with('mensaje', 'Cambio de contraseña fue un éxito. Por favor ingresa abajo.')
							->with('class', 'success');
						} else {
							return Redirect::route('forgot.password')
							->with('mensaje', 'No se ha podido restablecer la contraseña. Por favor, inténtalo de nuevo.')
							->with('class', 'danger');
						}
					} else {
						return Redirect::route('forgot.password')
						->with('mensaje', 'No se ha podido restablecer la contraseña. Por favor, vuelva a intentarlo.')
						->with('class', 'danger');
					}
				} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                    return Redirect::route('forgot.password')
                    ->with('mensaje', 'Usuario no encontrado.')->with('class', 'danger');
                }
            } else {
                return Redirect::route('forgot.password')
                ->with('mensaje', 'Solicitud no válida. Introduzca correo electrónico para restablecer su contraseña.')->with('class', 'danger');
            }
        } else {
            return Redirect::to('/newpassword?email='.Input::get('email').'&resetcode='.Input::get('resetcode'))
			->withErrors($validation)
			->withInput();
        }
	}
}
