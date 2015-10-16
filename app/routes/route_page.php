<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/pages/error', ['as' => 'pages.error', 'uses' => 'HomeController@getPagesError']);

Route::get('/emails/message', function ()
{
	$email = 'hector.zapana.condori@gmail.com';
	$description = 'Ing en Informatica y Sistemas';
	$answer = 'Dota 2';
	return View::make('emails.comments.message', ['email' => $email, 'description' => $description, 'answer' => $answer]);
});