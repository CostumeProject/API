<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/




$router->post('login', 'UserController@login');


// All the route inside here have the prerequisite of being connected, and need
// a valid token send along
$router->group(['middleware' => ['token', 'auth']], function () use ($router) {
    $router->get('islogged', 'UserController@isLogged');
});
