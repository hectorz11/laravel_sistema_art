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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/signin', ['as' => 'signin', 'uses' => 'HomeController@getSignIn']);

Route::group(['before' => 'guest'], function() 
{
	Route::get('/register/{userId}/activated/{activationCode}', [
		'as' => 'register.activated', 'uses' => 'HomeController@getRegisterActivated']);
	
	Route::group(['before' => 'csrf'], function() {
		Route::post('/signin', ['as' => 'signin.post', 'uses' => 'HomeController@postSignIn']);
		Route::post('/signup', ['as' => 'signup.post', 'uses' => 'HomeController@postSignUp']);
	});
});

Route::get('/signout', ['as' => 'signout', 'uses' => 'HomeController@getSignOut']);

Route::group(['prefix' => '/admin', 'before' => 'admin:admin'], function() 
{
	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);

	Route::group(['prefix' => '/user'], function() 
	{
		Route::get('/index',['as' => 'admin_user_index', 'uses' => 'UserController@getAdminIndex']);
		Route::get('/create',['as' => 'admin_user_create', 'uses' => 'UserController@getAdminCreate']);
		Route::get('/update/{id}',['as' => 'admin_user_update', 'uses' => 'UserController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/create',['as' => 'admin_user_create_post', 'uses' => 'UserController@postAdminCreate']);
			Route::put('/update/{id}',['as' => 'admin_user_update_post', 'uses' => 'UserController@putAdminUpdate']);
			Route::delete('/delete/{id}',['as' => 'admin_user_delete_post', 'uses' => 'UserController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/notaries'], function() 
	{
		Route::get('/', ['as' => 'admin.notaries.index', 'uses' => 'NotaryController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.notaries.create', 'uses' => 'NotaryController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.notaries.edit', 'uses' => 'NotaryController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.notaries.store', 'uses' => 'NotaryController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.notaries.update', 'uses' => 'NotaryController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.notaries.destroy', 'uses' => 'NotaryController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/municipalities'], function() 
	{
		Route::get('/', ['as' => 'admin.municipalities.index', 'uses' => 'MunicipalityController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.municipalities.create', 'uses' => 'MunicipalityController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.municipalities.edit', 'uses' => 'MunicipalityController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.municipalities.store', 'uses' => 'MunicipalityController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.municipalities.update', 'uses' => 'MunicipalityController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.municipalities.destroy', 'uses' => 'MunicipalityController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/deeds'], function() 
	{
		Route::get('/', ['as' => 'admin.deeds.index', 'uses' => 'DeedController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.deeds.create', 'uses' => 'DeedController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.deeds.edit', 'uses' => 'DeedController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.deeds.store', 'uses' => 'DeedController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.deeds.update', 'uses' => 'DeedController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.deeds.destroy', 'uses' => 'DeedController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/agrarians'], function() 
	{
		Route::get('/', ['as' => 'admin.agrarians.index', 'uses' => 'AgrarianController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.agrarians.create', 'uses' => 'AgrarianController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.agrarians.edit', 'uses' => 'AgrarianController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.agrarians.store', 'uses' => 'AgrarianController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.agrarians.update', 'uses' => 'AgrarianController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.agrarians.destroy', 'uses' => 'AgrarianController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/civils'], function() 
	{	
		Route::get('/', ['as' => 'admin.civils.index', 'uses' => 'CivilController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.civils.create', 'uses' => 'CivilController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.civils.edit', 'uses' => 'CivilController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.civils.store', 'uses' => 'CivilController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.civils.update', 'uses' => 'CivilController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.civils.destroy', 'uses' => 'CivilController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/records'], function() 
	{	
		Route::get('/', ['as' => 'admin.records.index', 'uses' => 'RecordController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.records.create', 'uses' => 'RecordController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.records.edit', 'uses' => 'RecordController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.records.store', 'uses' => 'RecordController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.records.update', 'uses' => 'RecordController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.records.destroy', 'uses' => 'RecordController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/penals'], function() 
	{	
		Route::get('/', ['as' => 'admin.penals.index', 'uses' => 'PenalController@getAdminIndex']);
		Route::get('/create', ['as' => 'admin.penals.create', 'uses' => 'PenalController@getAdminCreate']);
		Route::get('/{id}', ['as' => 'admin.penals.edit', 'uses' => 'PenalController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			Route::post('/', ['as' => 'admin.penals.store', 'uses' => 'PenalController@postAdminCreate']);
			Route::put('/{id}', ['as' => 'admin.penals.update', 'uses' => 'PenalController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => 'admin.penals.destroy', 'uses' => 'PenalController@deleteAdminDelete']);
		});
	});

});

Route::group(['prefix' => '/user', 'before' => 'user:user'], function() {

	Route::get('/', ['as' => 'user.dashboard', 'uses' => 'UserController@getIndex']);

	Route::group(['before' => 'csrf'], function() {
		Route::put('/{id}', ['as' => 'user.update', 'uses' => 'UserController@putUserUpdate']);
	});
});

Route::get('/facebook', ['as' => 'facebook', 'uses' => 'OAuthController@loginWithFacebook']);
Route::get('/google', ['as' => 'google', 'uses' => 'OAuthController@loginWithGoogle']);