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
			'as' => 'signin_post', 'uses' => 'HomeController@postSignIn'));
		Route::post('/signup', array(
			'as' => 'signup_post', 'uses' => 'HomeController@postSignUp'));
	});
});

Route::get('/signout', array(
	'as' => 'signout', 'uses' => 'HomeController@getSignOut'));

Route::group(array('prefix' => '/admin', 'before' => 'admin:admin'), function() {

	Route::get('/', array(
		'as' => 'admin_dashboard', 'uses' => 'AdminController@index'));

	Route::group(array('prefix' => '/notary'), function() {

		Route::get('/index', array(
			'as' => 'admin_notary_index', 'uses' => 'NotaryController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_notary_create', 'uses' => 'NotaryController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_notary_update', 'uses' => 'NotaryController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_notary_create_post', 'uses' => 'NotaryController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_notary_update_post', 'uses' => 'NotaryController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_notary_delete_post', 'uses' => 'NotaryController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/municipality'), function() {

		Route::get('/index', array(
			'as' => 'admin_municipality_index', 'uses' => 'MunicipalityController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_municipality_create', 'uses' => 'MunicipalityController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_municipality_update', 'uses' => 'MunicipalityController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_municipality_create_post', 'uses' => 'MunicipalityController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_municipality_update_post', 'uses' => 'MunicipalityController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_municipality_delete_post', 'uses' => 'MunicipalityController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/deed'), function() {

		Route::get('/index', array(
			'as' => 'admin_deed_index', 'uses' => 'DeedController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_deed_create', 'uses' => 'DeedController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_deed_update', 'uses' => 'DeedController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_deed_create_post', 'uses' => 'DeedController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_deed_update_post', 'uses' => 'DeedController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_deed_delete_post', 'uses' => 'DeedController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/agrarian'), function() {
		
		Route::get('/index', array(
			'as' => 'admin_agrarian_index', 'uses' => 'AgrarianController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_agrarian_create', 'uses' => 'AgrarianController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_agrarian_update', 'uses' => 'AgrarianController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_agrarian_create_post', 'uses' => 'AgrarianController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_agrarian_update_post', 'uses' => 'AgrarianController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_agrarian_delete_post', 'uses' => 'AgrarianController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/civil'), function() {
		
		Route::get('/index', array(
			'as' => 'admin_civil_index', 'uses' => 'CivilController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_civil_create', 'uses' => 'CivilController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_civil_update', 'uses' => 'CivilController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_civil_create_post', 'uses' => 'CivilController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_civil_update_post', 'uses' => 'CivilController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_civil_delete_post', 'uses' => 'CivilController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/record'), function() {
		
		Route::get('/index', array(
			'as' => 'admin_record_index', 'uses' => 'RecordController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_record_create', 'uses' => 'RecordController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_record_update', 'uses' => 'RecordController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_record_create_post', 'uses' => 'RecordController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_record_update_post', 'uses' => 'RecordController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_record_delete_post', 'uses' => 'RecordController@postAdminDelete'));
		});
	});

	Route::group(array('prefix' => '/penal'), function() {
		
		Route::get('/index', array(
			'as' => 'admin_penal_index', 'uses' => 'PenalController@getAdminIndex'));
		Route::get('/create', array(
			'as' => 'admin_penal_create', 'uses' => 'PenalController@getAdminCreate'));
		Route::get('/update/{id}', array(
			'as' => 'admin_penal_update', 'uses' => 'PenalController@getAdminUpdate'));

		Route::group(array('before' => 'csrf'), function() {

			Route::post('/create', array(
				'as' => 'admin_penal_create_post', 'uses' => 'PenalController@postAdminCreate'));
			Route::post('/update/{id}', array(
				'as' => 'admin_penal_update_post', 'uses' => 'PenalController@postAdminUpdate'));
			Route::post('/delete/{id}', array(
				'as' => 'admin_penal_delete_post', 'uses' => 'PenalController@postAdminDelete'));
		});
	});

});