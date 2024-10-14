<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('api/documentation', 'SwaggerController@index');
    $router->post('auth/login',  ['uses' => 'AuthController@authenticateUser']);
$router->group(['middleware' => 'jwt.auth'], function() use ($router) {
    $router->get('status',  ['uses' => 'StatusController@index']);
    $router->get('users/{userID}/session/history',  ['uses' => 'SessionController@getUserSessionHistoryWithScore']);
    $router->get('users/{userID}/latest-session-category',  ['uses' => 'SessionController@getUserLastestSessionHistoryWithCategory']);


});
});
