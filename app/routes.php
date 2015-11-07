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

/**
 * Rutas de las paginas de la web
 *
 */
require __DIR__.'/routes/route_page.php';

/**
 * Rutas de Autentificación
 *
 */
require __DIR__.'/routes/route_auth.php';

/**
 * Rutas de Administrador
 *
 */
require __DIR__.'/routes/route_admin.php';

/**
 * Rutas de Usuarios
 *
 */
require __DIR__.'/routes/route_user.php';