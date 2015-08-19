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

Route::get('/admin', array(
	'as' => 'admin_dashboard', 'uses' => 'AdminController@index'));
