<?php

Route::group(['before' => 'guest'], function() 
{
	Route::get('/register/{userId}/activated/{activationCode}', [
		'as' => 'register.activated', 'uses' => 'HomeController@getRegisterActivated']);
	Route::get('/signin', ['as' => 'signin', 'uses' => 'HomeController@getSignIn']);
	
	Route::group(['before' => 'csrf'], function() {
		Route::post('/signin', ['as' => 'signin.post', 'uses' => 'HomeController@postSignIn']);
		Route::post('/signup', ['as' => 'signup.post', 'uses' => 'HomeController@postSignUp']);
	});
});

Route::get('/signout', ['as' => 'signout', 'uses' => 'HomeController@getSignOut']);

Route::get('/facebook', ['as' => 'facebook', 'uses' => 'OAuthController@loginWithFacebook']);
Route::get('/twitter', ['as' => 'twitter', 'uses' => 'OAuthController@loginWithTwitter']);
Route::get('/google', ['as' => 'google', 'uses' => 'OAuthController@loginWithGoogle']);
Route::get('/github', ['as' => 'github', 'uses' => 'OAuthController@loginWithGitHub']);