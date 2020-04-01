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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('koromon',  ['uses' => 'KoromonController@showAllMonsters']);
  
    $router->get('koromon/{id}', ['uses' => 'KoromonController@showOneMonster']);
  
    $router->post('koromon', ['uses' => 'KoromonController@create']);
  
    $router->delete('koromon/{id}', ['uses' => 'KoromonController@delete']);
  
    $router->put('koromon/{id}', ['uses' => 'KoromonController@update']);
  });

  $router->post(
    'auth/login', 
    [
       'uses' => 'AuthController@authenticate'
    ]
);