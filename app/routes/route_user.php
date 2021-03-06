<?php

/**
 * Grupo users
 *
 */
Route::group(['prefix' => '/users', 'before' => 'users:users'], function() 
{
	Route::get('/', ['as' => 'users.dashboard', 'uses' => 'UserController@getIndex']);
	Route::get('/deeds', ['as' => 'users.deeds.index', 'uses' => 'DeedController@getUserIndex']);
	Route::get('/agrarians', ['as' => 'users.agrarians.index', 'uses' => 'AgrarianController@getUserIndex']);
	Route::get('/civils', ['as' => 'users.civils.index', 'uses' => 'CivilController@getUserIndex']);
	Route::get('/penals', ['as' => 'users.penals.index', 'uses' => 'PenalController@getUserIndex']);
	Route::get('/records', ['as' => 'users.records.index', 'uses' => 'RecordController@getUserIndex']);
	Route::get('/profile/{id}', ['as' => 'users.profiles.edit', 'uses' => 'ProfileController@getUserUpdate']);

	Route::group(['before' => 'csrf'], function() 
	{
		Route::put('/profile/{id}', ['as' => 'users.profiles.update', 'uses' => 'ProfileController@putUserUpdate']);
	});

	/**
	 * Grupo comments
	 *
	 */
	Route::group(['prefix' => '/comments'], function()
	{
		Route::get('/', ['as' => 'users.comments.index', 'uses' => 'CommentController@getUserIndex']);
		Route::get('/{id}', ['as' => 'users.comments.edit', 'uses' => 'CommentController@getUserUpdate']);

		Route::group(['before' => 'csrf'], function()
		{
			Route::post('/', ['as' => 'users.comments.store', 'uses' => 'CommentController@postUserCreate']);
			Route::put('/{id}', ['as' => 'users.comments.update', 'uses' => 'CommentController@putUserUpdate']);
			Route::delete('/', ['as' => 'users.comments.delete', 'uses' => 'CommentController@deleteUserDelete']);
		});
	});
});