<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('events.index');
});

Route::resource('sports', 'SportController');
Route::resource('courts', 'CourtController');
Route::resource('tournaments', 'TournamentController');

Route::resource('teams', 'TeamController');
Route::resource('teams.participants', 'TeamParticipantController', ['only' => ['destroy', 'store']]);

Route::resource('participants', 'ParticipantController');

Route::resource('events', 'EventController');
Route::resource('events.tournaments', 'EventTournamentController', [ 'only' => ['index', 'show']]);

Route::resource('events.import', 'EventImportController', ['only' => ['store']]);
