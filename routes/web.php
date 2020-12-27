<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\File;

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
    // return File::get(public_path() . '/docs/index.html');
    return '<h1>CovItaly Public REST APIs</h1> <a href="docs/index.html">Go to Documentation</a> - <a href="https://covitaly.it">Back to Covitaly.it</a>'; 
    // .$router->app->version();
});

$router->get('zones',  ['uses' => 'ZonesController@showAllCurrentZones']);
$router->get('zones/{region}', ['uses' => 'ZonesController@showASingleZone']);
$router->get('status', ['uses' => 'ZonesController@showZonesGroupedByStatus']);

