<?php

Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@delete');

Route::group(['prefix' => '/admin', 'before' => 'admin:admin'], function() 
{
	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);

	Route::group(['prefix' => '/users'], function() 
	{
		$userG = 'admin.users';
		Route::get('/', ['as' => $userG . '.index', 'uses' => 'UserController@getAdminIndex']);
		Route::get('/create', ['as' => $userG . '.create', 'uses' => 'UserController@getAdminCreate']);
		Route::get('/{id}', ['as' => $userG . '.edit', 'uses' => 'UserController@getAdminUpdate']);
		Route::get('/roles/users/{id}', ['as' => $userG . '.role', 'uses' => 'UserController@getAdminRole']);

		Route::group(['before' => 'csrf'], function() 
		{
			$userP = 'admin.users';
			Route::post('/', ['as' => $userP . '.store', 'uses' => 'UserController@postAdminCreate']);
			Route::put('/{id}', ['as' => $userP . '.update', 'uses' => 'UserController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $userP . '.delete', 'uses' => 'UserController@deleteAdminDelete']);
			Route::post('/roles/users/{id}', ['as' => $userP . '.role.post', 'uses' => 'UserController@postAdminRole']);
		});
	});

	Route::group(['prefix' => '/profiles'], function()
	{
		Route::get('/{id}', ['as' => 'admin.profiles.edit', 'uses' => 'ProfileController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function()
		{
			Route::put('/{id}', ['as' => 'admin.profiles.update', 'uses' => 'ProfileController@putAdminUpdate']);
		});
	});

	Route::group(['prefix' => '/groups'], function()
	{
		$groG = 'admin.groups';
		Route::get('/', ['as' => $groG . '.index', 'uses' => 'GroupController@getAdminIndex']);
		Route::get('/create', ['as' => $groG . '.create', 'uses' => 'GroupController@getAdminCreate']);
		Route::get('/{id}', ['as' => $groG . '.edit', 'uses' => 'GroupController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function()
		{
			$groP = 'admin.groups';
			Route::post('/', ['as' => $groP . '.store', 'uses' => 'GroupController@postAdminCreate']);
			Route::put('/{id}', ['as' => $groP . '.update', 'uses' => 'GroupController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $groP . '.delete', 'uses' => 'GroupController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/notaries'], function() 
	{
		$notG = 'admin.notaries';
		Route::get('/', ['as' => $notG . '.index', 'uses' => 'NotaryController@getAdminIndex']);
		Route::get('/create', ['as' => $notG . '.create', 'uses' => 'NotaryController@getAdminCreate']);
		Route::get('/{id}', ['as' => $notG . '.edit', 'uses' => 'NotaryController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$notP = 'admin.notaries';
			Route::post('/', ['as' => $notP . '.store', 'uses' => 'NotaryController@postAdminCreate']);
			Route::put('/{id}', ['as' => $notP . '.update', 'uses' => 'NotaryController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $notP . '.delete', 'uses' => 'NotaryController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/municipalities'], function() 
	{
		$munG = 'admin.municipalities';
		Route::get('/', ['as' => $munG . '.index', 'uses' => 'MunicipalityController@getAdminIndex']);
		Route::get('/create', ['as' => $munG . '.create', 'uses' => 'MunicipalityController@getAdminCreate']);
		Route::get('/{id}', ['as' => $munG . '.edit', 'uses' => 'MunicipalityController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$munP = 'admin.municipalities';
			Route::post('/', ['as' => $munP . '.store', 'uses' => 'MunicipalityController@postAdminCreate']);
			Route::put('/{id}', ['as' => $munP . '.update', 'uses' => 'MunicipalityController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $munP . '.delete', 'uses' => 'MunicipalityController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/deeds'], function() 
	{
		$deeG = 'admin.deeds';
		Route::get('/', ['as' => $deeG . '.index', 'uses' => 'DeedController@getAdminIndex']);
		Route::get('/create', ['as' => $deeG . '.create', 'uses' => 'DeedController@getAdminCreate']);
		Route::get('/{id}', ['as' => $deeG . '.edit', 'uses' => 'DeedController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$deeP = 'admin.deeds';
			Route::post('/', ['as' => $deeP . '.store', 'uses' => 'DeedController@postAdminCreate']);
			Route::put('/{id}', ['as' => $deeP . '.update', 'uses' => 'DeedController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $deeP . '.delete', 'uses' => 'DeedController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/agrarians'], function() 
	{
		$agrG = 'admin.agrarians';
		Route::get('/', ['as' => $agrG . '.index', 'uses' => 'AgrarianController@getAdminIndex']);
		Route::get('/create', ['as' => $agrG . '.create', 'uses' => 'AgrarianController@getAdminCreate']);
		Route::get('/{id}', ['as' => $agrG . '.edit', 'uses' => 'AgrarianController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$agrP = 'admin.agrarians';
			Route::post('/', ['as' => $agrP . '.store', 'uses' => 'AgrarianController@postAdminCreate']);
			Route::put('/{id}', ['as' => $agrP . '.update', 'uses' => 'AgrarianController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $agrP . '.delete', 'uses' => 'AgrarianController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/civils'], function() 
	{	
		$civG = 'admin.civils';
		Route::get('/', ['as' => $civG . '.index', 'uses' => 'CivilController@getAdminIndex']);
		Route::get('/create', ['as' => $civG . '.create', 'uses' => 'CivilController@getAdminCreate']);
		Route::get('/{id}', ['as' => $civG . '.edit', 'uses' => 'CivilController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$civP = 'admin.civils';
			Route::post('/', ['as' => $civP . '.store', 'uses' => 'CivilController@postAdminCreate']);
			Route::put('/{id}', ['as' => $civP . '.update', 'uses' => 'CivilController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $civP . '.delete', 'uses' => 'CivilController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/records'], function() 
	{	
		$recG = 'admin.records';
		Route::get('/', ['as' => $recG . '.index', 'uses' => 'RecordController@getAdminIndex']);
		Route::get('/create', ['as' => $recG . '.create', 'uses' => 'RecordController@getAdminCreate']);
		Route::get('/{id}', ['as' => $recG . '.edit', 'uses' => 'RecordController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$recP = 'admin.records';
			Route::post('/', ['as' => $recP . '.store', 'uses' => 'RecordController@postAdminCreate']);
			Route::put('/{id}', ['as' => $recP . '.update', 'uses' => 'RecordController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $recP . '.delete', 'uses' => 'RecordController@deleteAdminDelete']);
		});
	});

	Route::group(['prefix' => '/penals'], function() 
	{	
		$penG = 'admin.penals';
		Route::get('/', ['as' => $penG . '.index', 'uses' => 'PenalController@getAdminIndex']);
		Route::get('/create', ['as' => $penG . '.create', 'uses' => 'PenalController@getAdminCreate']);
		Route::get('/{id}', ['as' => $penG . '.edit', 'uses' => 'PenalController@getAdminUpdate']);

		Route::group(['before' => 'csrf'], function() 
		{
			$penP = 'admin.penals';
			Route::post('/', ['as' => $penP . '.store', 'uses' => 'PenalController@postAdminCreate']);
			Route::put('/{id}', ['as' => $penP . '.update', 'uses' => 'PenalController@putAdminUpdate']);
			Route::delete('/{id}', ['as' => $penP . '.delete', 'uses' => 'PenalController@deleteAdminDelete']);
		});
	});

});
