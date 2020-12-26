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
    return '<h1>CovItaly Public REST APIs</h1> <br>'.$router->app->version();
});

$router->group(['prefix' => 'public'], function () use ($router) {

    $router->get('zones',  ['uses' => 'ZonesController@showAllCurrentZones']);
    $router->get('zones/{region}', ['uses' => 'ZonesController@showASingleZone']);
    $router->get('status', ['uses' => 'ZonesController@showZonesGroupedByStatus']);
});
