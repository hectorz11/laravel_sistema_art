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

require __DIR__.'/routes/page.php';

require __DIR__.'/routes/authenticate.php';

require __DIR__.'/routes/admin.php';

require __DIR__.'/routes/user.php';