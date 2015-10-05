<?php

Route::group(['before' => 'guest'], function() 
{
	Route::get('/register/{userId}/activated/{activationCode}', [
		'as' => 'register.activated', 'uses' => 'HomeController@getRegisterActivated']);
	Route::get('/signin', ['as' => 'signin', 'uses' => 'HomeController@getSignIn']);
	Route::get('/signup', ['as' => 'signup', 'uses' => 'HomeController@getSignUp']);
	Route::get('/forgot/password', ['as' => 'forgot.password', 'uses' => 'HomeController@getForgotPassword']);
	
	
	Route::group(['before' => 'csrf'], function() {
		Route::post('/signin', ['as' => 'signin.post', 'uses' => 'HomeController@postSignIn']);
		Route::post('/signup', ['as' => 'signup.post', 'uses' => 'HomeController@postSignUp']);
		Route::post('/forgot/password', ['as' => 'forgot.password.post', 'uses' => 'HomeController@postForgotPassword']);
		
	});
});

Route::get('/signout', ['as' => 'signout', 'uses' => 'HomeController@getSignOut']);

Route::get('/facebook', ['as' => 'facebook', 'uses' => 'OAuthController@loginWithFacebook']);
Route::get('/twitter', ['as' => 'twitter', 'uses' => 'OAuthController@loginWithTwitter']);
Route::get('/google', ['as' => 'google', 'uses' => 'OAuthController@loginWithGoogle']);
Route::get('/github', ['as' => 'github', 'uses' => 'OAuthController@loginWithGitHub']);

Route::get('/new/password', ['as' => 'new.password', 'uses' => 'HomeController@getNewPassword']);
Route::post('/new/password', ['as' => 'new.password.post', 'uses' => 'HomeController@postNewPassword']);