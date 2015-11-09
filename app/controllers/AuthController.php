<?php

class AuthController extends \BaseController {

	/**
	 * Atributos de AuthController
	 *
	 */
	protected $user = null;

	/**
	 * Metodos de AuthController
	 *
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * signin
	 *
	 */
	public function getSignIn()
	{
		return View::make('pages.guest.sign_in');
	}

	/**
	 * signin.post
	 *
	 */
	public function postSignIn()
	{
		try {
			$credenciales = array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
			);

			$sentry = Sentry::authenticate($credenciales, false);
			$user = $this->user->find($sentry->id);

			if (!$user->tokens()->where('client', BrowserDetect::toString())->first()) {
				$token = [];
				$token['api_token'] = hash('sha256', Str::random(10), false);
				$token['client'] = BrowserDetect::toString();
				$token['expires_on'] = 0;
				$user->tokens()->save(new Token($token));
			}

			if (Sentry::check()) {

				if($sentry->hasAnyAccess(['admin'])) {
					return Redirect::route('admin.dashboard')
					->with(['message' => $sentry->first_name.' '.$sentry->last_name, 'class' => 'info']);
				}
				else if($sentry->hasAnyAccess(['users'])) {
					return Redirect::route('users.dashboard')
					->with(['message' => $sentry->first_name.' '.$sentry->last_name, 'class' => 'info']);
				}
			} 
			else {
				return Redirect::route('home')->withInput();
			}
		} 
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Se requiere campo E-Mail', 'class' => 'warning']);
		} 
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Se requiere campo Contraseña.', 'class' => 'warning']);
		} 
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Redirect::route('signin')
			->with(['message' => 'Contraseña incorrecta, vuelva a intentarlo.', 'class' => 'warning']);
		} 
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Redirect::route('signin')
			->with(['message' => 'El usuario no se ha encontrado.', 'class' => 'danger']);
		} 
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
			return Redirect::route('signin')
			->with(['message' => 'El usuario no está activado.', 'class' => 'warning']);
	    }
		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e){
			return Redirect::route('signin')
			->with(['message' => 'Usuario está suspendido.', 'class' => 'info']);
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e){
			return Redirect::route('signin')
			->with(['message' => 'Usuario está prohibido.', 'class' => 'info']);
		}
	}

	/**
	 * signout
	 *
	 */
	public function getSignOut()
	{
		Sentry::logout();
		return Redirect::route('home');
	}

	/**
	 * signup
	 *
	 */
	public function getSignUp()
	{
		return View::make('pages.guest.sign_up');
	}

	/**
	 * signup.post
	 *
	 */
	public function postSignUp()
	{
		try {			
			$answer = $this->user->createUser(Input::all());

			if ($answer['error'] == true) {
				return Redirect::route('home');
			}
			else {
				$user = $answer['data'];
				$data['activationCode'] = $user->GetActivationCode();
				$data['email'] = $user->email;
				$data['first_name'] = $user->first_name;
				$data['last_name'] = $user->last_name;
				$data['userId'] = $user->getId();
				$data['password'] = Input::get('password');

				Mail::send('emails.auth.activated', $data, function($m) use ($data) {
					$m->to($data['email'])->subject('Gracias por registrarse - Support Team ART');
				});

				return Redirect::route('signin');
			}
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			return Redirect::route('signup')
			->with(['message' => 'Se requiere campo de E-Mail.', 'class' => 'warning']);
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			return Redirect::route('signup')
			->with(['message' => 'Se requiere campo Contraseña.', 'class' => 'warning']);
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e) {
			return Redirect::route('signup')
			->with(['message' => 'El usuario no se ha encontrado.', 'class' => 'warning']);
		}
	}

	/**
	 * register.activated
	 *
	 */ 
	public function getRegisterActivated($userId, $activationCode)
	{
		try {
			$user = Sentry::findUserById($userId);

			if ($user->attemptActivation($activationCode)) {
				return Redirect::route('signin')
				->with('message', 'La activación de usuario fue un éxito, porfavor ingresa arriba.')
				->with('class', 'success');
			}
			else {
				return Redirect::route('signin')
				->with('message', 'No se puede activar el usuario inténtalo de nuevo más tarde o póngase en contacto con equipo de apoyo.')
				->with('class', 'danger');
			}
		} 
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Redirect::route('signin')
			->with('message', 'El usuario no se ha encontrado.')->with('class', 'success');
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e) {
			return Redirect::route('signin')
			->with('message', 'El usuario ya está activado.')->with('class', 'success');
		}
	}

	/**
	 * forgot.password
	 *
	 */
	public function getForgotPassword()
	{
		return View::make('pages.guest.forgot_password');
	}

	/**
	 * forgot.password.post
	 *
	 */
	public function postForgotPassword()
	{
		if (Input::has('email')) {
			try {
				$email = Input::get('email');
				$sentry = Sentry::findUserByLogin($email);
				$resetCode = $sentry->getResetPasswordCode();
				$user = $this->user->selectUser($sentry->id);

				Mail::send("emails.auth.reset_password", array('email' => $email, 'resetCode' => $resetCode), 
					function($message) use ($email, $resetCode) {
						$message->to($email)->subject('Siga el enlace para restablecer tu contraseña');
					}
				);

				return Redirect::route('forgot.password')
				->with('mensaje', 'Hemos enviado un enlace a su cuenta de correo electrónico por favor, siga a restablecer su contraseña.')->with('class', 'success');
			} 
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
				return Redirect::route('forgot.password')
				->with(['mensaje' => 'Usuario no encontrado', 'class' => 'info']);
			}
		} 
		else {
			return Redirect::route('forgot.password')
			->with(['mensaje' => 'TEAM ART: Error email', 'class' => 'danger']);
		}
	}

	/**
	 * new.password
	 *
	 */
	public function getNewPassword()
	{
		if (Input::has('email') && Input::has('resetcode')) {
			try {
				$sentry = Sentry::findUserByLogin(Input::get('email'));

				if ($sentry->checkResetPasswordCode(Input::get('resetcode'))) {
					return View::make('pages.guest.new_password')->with('user', $sentry);
				}
				else {
					return Redirect::route('forgot.password')
					->with('mensaje', 'Solicitud no válida. Introduzca DNI para restablecer su contraseña.')
					->with('class', 'danger');					
				}
			} 
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return Redirect::route('forgot.password')
                ->with('mensaje', 'Usuario no encontrado')->with('class', 'danger');
            }
		} 
		else {
			return Redirect::route('forgot.password')
			->with('mensaje', 'Solicitud no válida. Introduzca correo electrónico para restablecer su contraseña')
			->with('class', 'danger');
		}
	}

	/**
	 * new.password.post
	 *
	 */
	public function postNewPassword()
	{
		$rules = array(
			'password' => 'required|min:6|max:32',
			're_password' => 'required|min:6|max:32|same:password'
		);

		$validation = Validator::make(Input::all(), $rules);
		if ($validation->passes()) {
			if (Input::has('email') && Input::has('resetcode')) {
				try {
					$sentry = Sentry::findUserByLogin(Input::get('email'));

					if ($sentry->checkResetPasswordCode(Input::get('resetcode'))) {

						if ($sentry->attemptResetPassword(Input::get('resetcode'), Input::get('password'))) {
							return Redirect::route('signin')
							->with('mensaje', 'Cambio de contraseña fue un éxito. Por favor ingresa abajo con su nueva contraseña.')
							->with('class', 'success');
						}
						else {
							return Redirect::route('forgot.password')
							->with('mensaje', 'No se ha podido restablecer la contraseña. Por favor, inténtalo de nuevo.')
							->with('class', 'danger');
						}
					} 
					else {
						return Redirect::route('forgot.password')
						->with('mensaje', 'No se ha podido restablecer la contraseña. Por favor, vuelva a intentarlo.')
						->with('class', 'danger');
					}
				} 
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                    return Redirect::route('forgot.password')
                    ->with('mensaje', 'Usuario no encontrado.')->with('class', 'danger');
                }
			} 
            else {
                return Redirect::route('forgot.password')
                ->with('mensaje', 'Solicitud no válida. Introduzca correo electrónico para restablecer su contraseña.')
                ->with('class', 'danger');
			}
        } 
        else {
        	return Redirect::to('/new/password?email='.Input::get('email').'&resetcode='.Input::get('resetcode'))
        	->withErrors($validation)->withInput();
		}
	}

}