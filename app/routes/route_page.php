<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/pages/error', ['as' => 'pages.error', 'uses' => 'HomeController@getPagesError']);