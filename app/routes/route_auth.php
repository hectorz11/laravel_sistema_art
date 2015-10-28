<?php

Route::group(['before' => 'guest'], function() 
{
	Route::get('/register/{userId}/activated/{activationCode}', [
		'as' => 'register.activated', 'uses' => 'AuthController@getRegisterActivated']);
	Route::get('/signin', ['as' => 'signin', 'uses' => 'AuthController@getSignIn']);
	Route::get('/signup', ['as' => 'signup', 'uses' => 'AuthController@getSignUp']);
	Route::get('/forgot/password', ['as' => 'forgot.password', 'uses' => 'AuthController@getForgotPassword']);
	
	
	Route::group(['before' => 'csrf'], function() {
		Route::post('/signin', ['as' => 'signin.post', 'uses' => 'AuthController@postSignIn']);
		Route::post('/signup', ['as' => 'signup.post', 'uses' => 'AuthController@postSignUp']);
		Route::post('/forgot/password', ['as' => 'forgot.password.post', 'uses' => 'AuthController@postForgotPassword']);
		
	});
});

Route::get('/signout', ['as' => 'signout', 'uses' => 'AuthController@getSignOut']);

Route::get('/facebook', ['as' => 'facebook', 'uses' => 'OAuthController@loginWithFacebook']);
Route::get('/twitter', ['as' => 'twitter', 'uses' => 'OAuthController@loginWithTwitter']);
Route::get('/google', ['as' => 'google', 'uses' => 'OAuthController@loginWithGoogle']);
Route::get('/github', ['as' => 'github', 'uses' => 'OAuthController@loginWithGitHub']);

Route::get('/new/password', ['as' => 'new.password', 'uses' => 'AuthController@getNewPassword']);
Route::post('/new/password', ['as' => 'new.password.post', 'uses' => 'AuthController@postNewPassword']);

Route::post('/subscribe', ['as' => 'subscribe', 'uses' => 'MailchimpController@postCreate']);