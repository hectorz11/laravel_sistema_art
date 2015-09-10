<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/signin', array(
	'as' => 'signin', 'uses' => 'HomeController@getSignIn'));

Route::group(array('before' => 'guest'), function() {

	Route::get('/register/{userId}/activated/{activationCode}', array(
		'as' => 'register.activated', 'uses' => 'HomeController@getRegisterActivated'));
	
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/signin', array(
			'as' => 'signin.post', 'uses' => 'HomeController@postSignIn'));
		Route::post('/signup', array(
			'as' => 'signup.post', 'uses' => 'HomeController@postSignUp'));
	});
});

Route::get('/signout', array(
	'as' => 'signout', 'uses' => 'HomeController@getSignOut'));

Route::group(array('prefix' => '/admin', 'before' => 'admin:admin'), function() {

	Route::get('/', array(
		'as' => 'admin.dashboard', 'uses' => 'AdminController@index'));

	Route::group(array('prefix' => '/user'), function() {

		Route::get('/index', array(
			'as' => 'admin_user_index', 'uses' => 'UserController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_user_create', 'uses' => 'UserController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_user_update', 'uses' => 'UserController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_user_create_post', 'uses' => 'UserController@postAdminCreate'));
			Route::put('/update/{id}', array(
				'as' => 'admin_user_update_post', 'uses' => 'UserController@putAdminUpdate'));
			Route::delete('/delete/{id}', array(
				'as' => 'admin_user_delete_post', 'uses' => 'UserController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/notaries'), function() {

		Route::get('/', array(
			'as' => 'admin.notaries.index', 'uses' => 'NotaryController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.notaries.create', 'uses' => 'NotaryController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.notaries.edit', 'uses' => 'NotaryController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.notaries.store', 'uses' => 'NotaryController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.notaries.update', 'uses' => 'NotaryController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.notaries.destroy', 'uses' => 'NotaryController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/municipalities'), function() {

		Route::get('/', array(
			'as' => 'admin.municipalities.index', 'uses' => 'MunicipalityController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.municipalities.create', 'uses' => 'MunicipalityController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.municipalities.edit', 'uses' => 'MunicipalityController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.municipalities.store', 'uses' => 'MunicipalityController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.municipalities.update', 'uses' => 'MunicipalityController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.municipalities.destroy', 'uses' => 'MunicipalityController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/deeds'), function() {

		Route::get('/', array(
			'as' => 'admin.deeds.index', 'uses' => 'DeedController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.deeds.create', 'uses' => 'DeedController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.deeds.edit', 'uses' => 'DeedController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.deeds.store', 'uses' => 'DeedController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.deeds.update', 'uses' => 'DeedController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.deeds.destroy', 'uses' => 'DeedController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/agrarians'), function() {
		
		Route::get('/', array(
			'as' => 'admin.agrarians.index', 'uses' => 'AgrarianController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.agrarians.create', 'uses' => 'AgrarianController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.agrarians.edit', 'uses' => 'AgrarianController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.agrarians.store', 'uses' => 'AgrarianController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.agrarians.update', 'uses' => 'AgrarianController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.agrarians.destroy', 'uses' => 'AgrarianController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/civils'), function() {
		
		Route::get('/', array(
			'as' => 'admin.civils.index', 'uses' => 'CivilController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.civils.create', 'uses' => 'CivilController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.civils.edit', 'uses' => 'CivilController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.civils.store', 'uses' => 'CivilController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.civils.update', 'uses' => 'CivilController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.civils.destroy', 'uses' => 'CivilController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/records'), function() {
		
		Route::get('/', array(
			'as' => 'admin.records.index', 'uses' => 'RecordController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.records.create', 'uses' => 'RecordController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.records.edit', 'uses' => 'RecordController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.records.store', 'uses' => 'RecordController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.records.update', 'uses' => 'RecordController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.records.destroy', 'uses' => 'RecordController@deleteAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/penals'), function() {
		
		Route::get('/', array(
			'as' => 'admin.penals.index', 'uses' => 'PenalController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.penals.create', 'uses' => 'PenalController@getAdminCreate'));
		Route::get('/{id}', array(
			'as' => 'admin.penals.edit', 'uses' => 'PenalController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.penals.store', 'uses' => 'PenalController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.penals.update', 'uses' => 'PenalController@putAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.penals.destroy', 'uses' => 'PenalController@deleteAdminDelete'));
		});
	});

});

Route::get('/facebook', array(
	'as' => 'facebook', 'uses' => 'OAuthController@loginWithFacebook'));

Route::get('/google', array(
	'as' => 'google', 'uses' => 'OAuthController@loginWithGoogle'));