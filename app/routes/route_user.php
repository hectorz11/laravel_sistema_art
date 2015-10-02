<?php

Route::group(['prefix' => '/user', 'before' => 'users:users|auth.token'], function() {

	Route::get('/', ['as' => 'user.dashboard', 'uses' => 'UserController@getIndex']);
	Route::get('/deeds', ['as' => 'user.deeds.index', 'uses' => 'DeedController@getUserIndex']);
	Route::get('/agrarians', ['as' => 'user.agrarians.index', 'uses' => 'AgrarianController@getUserIndex']);
	Route::get('/civils', ['as' => 'user.civils.index', 'uses' => 'CivilController@getUserIndex']);
	Route::get('/penals', ['as' => 'user.penals.index', 'uses' => 'PenalController@getUserIndex']);
	Route::get('/records', ['as' => 'user.records.index', 'uses' => 'RecordController@getUserIndex']);

	Route::group(['before' => 'csrf'], function() {
		Route::put('/{id}', ['as' => 'user.update', 'uses' => 'UserController@putUserUpdate']);
	});
});