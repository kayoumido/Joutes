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
    $api->resource('events', 'App\Http\Controllers\EventController', [ 'only' => [
        'index', 'show'
    ]]);

    $api->resource('events.tournaments', 'App\Http\Controllers\EventTournamentController', [ 'only' => [
        'index', 'show'
    ]]);

    $api->resource('events.teams', 'App\Http\Controllers\EventTeamController', [ 'only' => [
        'index', 'show'
    ]]);
});
