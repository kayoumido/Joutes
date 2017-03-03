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


/* Routes who don't need any authentification */
Route::get('/', function () {
    return redirect()->route('events.index');
});
Route::resource('events', 'EventController', ['only' => ['index', 'show']]);
Route::resource('tournaments', 'TournamentController', ['only' => ['index', 'show']]);
Route::resource('events.tournaments', 'EventTournamentController', [ 'only' => ['index', 'show']]);
Route::resource('admin', 'SessionController', ['only' => ['index', 'store', 'destroy']]);


/* Routes who need authentification */
Route::resource('events', 'Admin\EventController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('tournaments', 'Admin\TournamentController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
Route::resource('sports', 'Admin\SportController');
Route::resource('courts', 'Admin\CourtController');
Route::resource('teams', 'Admin\TeamController');
Route::resource('participants', 'Admin\ParticipantController');
Route::resource('teams.participants', 'Admin\TeamParticipantController', ['only' => ['destroy', 'store']]);











