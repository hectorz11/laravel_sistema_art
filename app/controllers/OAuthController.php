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

			$idFacebook = $result['id'];
			if (isset($result['email'])) 
				$email = $result['email'];
			else $email = '';

			if (isset($result['first_name'])) 
				$first_name = $result['first_name'];
			else $first_name = '';

			if (isset($result['last_name'])) 
				$last_name = $result['last_name'];
			else $last_name = '';

			if (isset($result['birthday'])) 
				$birthday = $result['birthday']; 
			else $birthday = '';

			if (isset($result['gender'])) 
				$gender = $result['gender'];
			else $gender = '';

			$photoURL = 'http://graph.facebook.com/'.$result['id'].'/picture?type=large';

			//Var_dump
			//display whole array().
			//dd($result);
			//return Response::json([$message, $result]);
			return View::make('pages.facebook')
			->with('idFacebook', $idFacebook)
			->with('birthday', $birthday)
			->with('email', $email)
			->with('first_name', $first_name)
			->with('last_name', $last_name)
			->with('gender', $gender)
			->with('photoURL', $photoURL);

		}
	    // Si no pide permiso primero
	    else {
	        // Obtener la autorización facebook
	        $url = $fb->getAuthorizationUri();

	        // Devuelve a Facebook login url
	        return Redirect::to( (string)$url );
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

	        $idGoogle = $result['id'];
	        if (isset($result['email'])) 
				$email = $result['email'];
			else $email = '';

			if (isset($result['given_name'])) 
				$given_name = $result['given_name'];
			else $given_name = '';

			if (isset($result['family_name'])) 
				$family_name = $result['family_name'];
			else $family_name = '';

			if (isset($result['gender'])) 
				$gender = $result['gender'];
			else $gender = '';

			if (isset($result['picture']))
				$photoURL = $result['picture'];
			else $photoURL = '';

	        //return Response::json($result);
	        //display whole array().
	        //dd($result);
	        return View::make('pages.google')
			->with('idGoogle', $idGoogle)
			->with('email', $email)
			->with('given_name', $given_name)
			->with('family_name', $family_name)
			->with('gender', $gender)
			->with('photoURL', $photoURL);

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return Redirect::to( (string)$url );
	    }
	}
}