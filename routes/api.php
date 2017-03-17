<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['middleware'=>App\Http\Middleware\AddCorsHeaders::class], function($api) {
        // header('Access-Control-Allow-Origin: *'); // Put in middleware
        $api->resource('events', 'App\Http\Controllers\EventController', [ 'only' => [
            'index', 'show'
        ]]);
        // header('Access-Control-Allow-Origin: *'); // Put in middleware
        $api->resource('events.tournaments', 'App\Http\Controllers\EventTournamentController', [ 'only' => [
            'index', 'show'
        ]]);
        // header('Access-Control-Allow-Origin: *'); // Put in middleware
        $api->resource('events.teams', 'App\Http\Controllers\API\EventTeamController', [ 'only' => [
            'index', 'show'
        ]]);
    });
});
