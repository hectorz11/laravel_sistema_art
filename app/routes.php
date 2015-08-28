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

	Route::get('/registro/{userId}/activacion/{activationCode}', array(
		'as' => 'registro_activated', 'uses' => 'AccountController@getRegistroActivated'));
	
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
				'as' => 'admin_user_update_post', 'uses' => 'UserController@postAdminUpdate'));
			Route::delete('/delete/{id}', array(
				'as' => 'admin_user_delete_post', 'uses' => 'UserController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/notaries'), function() {

		Route::get('/', array(
			'as' => 'admin.notaries.index', 'uses' => 'NotaryController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.notaries.create', 'uses' => 'NotaryController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.notaries.edit', 'uses' => 'NotaryController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.notaries.store', 'uses' => 'NotaryController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.notaries.update', 'uses' => 'NotaryController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.notaries.destroy', 'uses' => 'NotaryController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/municipalities'), function() {

		Route::get('/', array(
			'as' => 'admin.municipalities.index', 'uses' => 'MunicipalityController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.municipalities.create', 'uses' => 'MunicipalityController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.municipalities.edit', 'uses' => 'MunicipalityController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.municipalities.store', 'uses' => 'MunicipalityController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.municipalities.update', 'uses' => 'MunicipalityController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.municipalities.destroy', 'uses' => 'MunicipalityController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/deeds'), function() {

		Route::get('/index', ['uses' => 'DeedController@index']);
		Route::get('/', array(
			'as' => 'admin.deeds.index', 'uses' => 'DeedController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.deeds.create', 'uses' => 'DeedController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.deeds.edit', 'uses' => 'DeedController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.deeds.store', 'uses' => 'DeedController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.deeds.update', 'uses' => 'DeedController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.deeds.destroy', 'uses' => 'DeedController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/agrarians'), function() {
		
		Route::get('/', array(
			'as' => 'admin.agrarians.index', 'uses' => 'AgrarianController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.agrarians.create', 'uses' => 'AgrarianController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.agrarians.edit', 'uses' => 'AgrarianController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.agrarians.store', 'uses' => 'AgrarianController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.agrarians.update', 'uses' => 'AgrarianController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.agrarians.destroy', 'uses' => 'AgrarianController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/civils'), function() {
		
		Route::get('/', array(
			'as' => 'admin.civils.index', 'uses' => 'CivilController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.civils.create', 'uses' => 'CivilController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.civils.edit', 'uses' => 'CivilController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.civils.store', 'uses' => 'CivilController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.civils.update', 'uses' => 'CivilController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.civils.destroy', 'uses' => 'CivilController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/records'), function() {
		
		Route::get('/', array(
			'as' => 'admin.records.index', 'uses' => 'RecordController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.records.create', 'uses' => 'RecordController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.records.edit', 'uses' => 'RecordController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.records.store', 'uses' => 'RecordController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.records.update', 'uses' => 'RecordController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.records.destroy', 'uses' => 'RecordController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/penals'), function() {
		
		Route::get('/', array(
			'as' => 'admin.penals.index', 'uses' => 'PenalController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin.penals.create', 'uses' => 'PenalController@getAdminCreate'));
		Route::get('/{id}/edit', array(
			'as' => 'admin.penals.edit', 'uses' => 'PenalController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/', array(
				'as' => 'admin.penals.store', 'uses' => 'PenalController@postAdminCreate'));
			Route::put('/{id}', array(
				'as' => 'admin.penals.update', 'uses' => 'PenalController@postAdminUpdate'));
			Route::delete('/{id}', array(
				'as' => 'admin.penals.destroy', 'uses' => 'PenalController@postAdminDelete'));
		});
	});

});