<?php

class OAuthController extends \BaseController {

	public function loginWithFacebook() 
	{
		// Obtener los datos de entrada
		$code = Input::get( 'code' );

		// Obtener el servicio facebook
		$fb = OAuth::consumer( 'Facebook' );

		// Comprobar si el código es válido

		// Si no se proporciona código de datos del usuario obtener y abrir una sesión
		if ( !empty( $code ) ) {

			// Esta fue una petición de devolución de llamada de facebook, obtener el token
			$token = $fb->requestAccessToken( $code );

			// Enviar una solicitud con ella
			$result = json_decode( $fb->request( '/me' ), true );
			$idFb = $result['id'];

			$profile = Profile::whereSocialId($idFb)->first();

			if (empty($profile)) {
				if (isset($result['email'])) $email = $result['email'];
				else $email = '';

				if (isset($result['first_name'])) $firstName = $result['first_name'];
				else $firstName = '';

				if (isset($result['last_name'])) $lastName = $result['last_name'];
				else $lastName = '';

				if (isset($result['birthday'])) $birthday = $result['birthday']; 
				else $birthday = '';

				if (isset($result['gender'])) $gender = $result['gender'];
				else $gender = '';

				$photoURL = 'http://graph.facebook.com/'.$result['id'].'/picture?type=large';
				$accessToken = $token->getAccessToken();

				//Var_dump
				//display whole array().
				//dd($result, $token->getAccessToken());
				//return Response::json([$message, $result]);
				return View::make('pages.oauth.facebook')
				->with('idFb', $idFb)
				->with('birthday', $birthday)
				->with('email', $email)
				->with('first_name', $firstName)
				->with('last_name', $lastName)
				->with('gender', $gender)
				->with('photoURL', $photoURL)
				->with('token', $accessToken)
				->with('provider', 'facebook');
			}

			$profile->access_token = $token->getAccessToken();
			$profile->save();

			$user = Sentry::findUserById($profile->users->id);
			$login = Sentry::login($user, false);

			if(Sentry::check()) {
				$sentry = Sentry::getUser();
				$user = Sentry::findGroupByName('usuario');

				if($sentry->inGroup($user)) {
					return Redirect::route('users.dashboard');
				}
			}
		}
	    // Si no pide permiso primero
	    else {
	        // Obtener la autorización facebook
	        $url = $fb->getAuthorizationUri();

	        // Devuelve a Facebook login url
	        return Redirect::to( (string)$url );
	    }
	}

	public function loginWithTwitter() {
        // get data from input
        $code = \Input::get( 'go' );

        // get Twitter service
        /** @var $twitterService Twitter */
        $twitterService = OAuth::consumer( 'Twitter' );

        // check if code is valid

        // Instantiate the twitter service using the credentials, http client and storage mechanism for the token

        if (Input::get('oauth_token')) {

            $token = $twitterService->getStorage()->retrieveAccessToken('Twitter');

            // This was a callback request from twitter, get the token
            $twitterService->requestAccessToken(
                Input::get('oauth_token'),
                \Input::get('oauth_verifier'),
                $token->getRequestTokenSecret()
            );

            // Send a request now that we have access token
            $result = json_decode($twitterService->request('account/verify_credentials.json'));

            dd($result);

        } elseif (!empty($code) && $code === 'go') {

            // extra request needed for oauth1 to request a request token :-)
            $token = $twitterService->requestRequestToken();

            $url = $twitterService->getAuthorizationUri(array('oauth_token' => $token->getRequestToken()));
            header('Location: ' . $url);
            exit;
        } else {
            $url = URL::current() . '?go=go';
            echo "Login with Twitter!";
            exit;
        }
    }

	public function loginWithGoogle() {

	    // get data from input
		$code = Input::get( 'code' );

		// get google service
		$googleService = OAuth::consumer( 'Google' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

			// This was a callback request from google, get the token
			$token = $googleService->requestAccessToken( $code );

			// Send a request with it
			$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

			//$message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
			//echo $message. "<br/>";
			$idGg = $result['id'];

			$profile = Profile::whereSocialId($idGg)->first();

			if (empty($profile)) {
				if (isset($result['email'])) $email = $result['email'];
				else $email = '';

				if (isset($result['given_name'])) $given_name = $result['given_name'];
				else $given_name = '';

				if (isset($result['family_name'])) $family_name = $result['family_name'];
				else $family_name = '';

				if (isset($result['gender'])) $gender = $result['gender'];
				else $gender = '';

				if (isset($result['picture'])) $photoURL = $result['picture'];
				else $photoURL = '';

				$accessToken = $token->getAccessToken();

		        //return Response::json($result);
		        //display whole array().
		        //dd($result);
		        return View::make('pages.oauth.google')
				->with('idGg', $idGg)
				->with('email', $email)
				->with('given_name', $given_name)
				->with('family_name', $family_name)
				->with('gender', $gender)
				->with('photoURL', $photoURL)
				->with('token', $accessToken)
				->with('provider', 'google');
			}
			$profile->access_token = $token->getAccessToken();
			$profile->save();

			$user = Sentry::findUserById($profile->users->id);
			$login = Sentry::login($user, false);

			if(Sentry::check()) {
				$sentry = Sentry::getUser();
				$user = Sentry::findGroupByName('usuario');

				if($sentry->inGroup($user)) {
					return Redirect::route('users.dashboard');
				}
			}
		}
	    // if not ask for permission first
	    else {
			// get googleService authorization
			$url = $googleService->getAuthorizationUri();

			// return to google login url
	        return Redirect::to( (string)$url );
		}
	}

	public function loginWithGitHub() {

		// get data from input
		$code = Input::get( 'code' );

		// get google service
		$gitHubService = OAuth::consumer( 'GitHub' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

			// This was a callback request from google, get the token
			$token = $gitHubService->requestAccessToken( $code );

			// Send a request with it
			$result = json_decode( $gitHubService->request( 'https://api.github.com/user' ), true );

			//$message = 'Your unique GitHub user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
			//echo $message. "<br/>";
			$idGH = $result['id'];

			$profile = Profile::whereSocialId($idGH)->first();

			if (empty($profile)) {
				if (isset($result['email'])) $email = $result['email'];
				else $email = '';

				if (isset($result['name'])) $name = $result['name'];
				else $name = '';

				if (isset($result['avatar_url'])) $photoURL = $result['avatar_url'];
				else $photoURL = '';

				$accessToken = $token->getAccessToken();

				//return Response::json($result);
				//display whole array().
				//dd($result);
				return View::make('pages.oauth.github')
				->with('idGH', $idGH)
				->with('email', $email)
				->with('name', $name)
				->with('photoURL', $photoURL)
				->with('token', $accessToken)
				->with('provider', 'github');
			}
			$profile->access_token = $token->getAccessToken();
			$profile->save();

			$user = Sentry::findUserById($profile->users->id);
			$login = Sentry::login($user, false);

			if(Sentry::check()) {
				$sentry = Sentry::getUser();
				$user = Sentry::findGroupByName('usuario');

				if($sentry->inGroup($user)) {
					return Redirect::route('users.dashboard');
				}
			}
	}
	    // if not ask for permission first
	    else {
			// get gitHubService authorization
			$url = $gitHubService->getAuthorizationUri();

			// return to google login url
	        return Redirect::to( (string)$url );
		}
	}
}