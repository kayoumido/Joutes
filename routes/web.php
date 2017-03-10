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
// Prefix admin is here to have an url like that : .../admin/tournaments/create
// It will add the "admin" prefix before each "critical" URLs
Route::group([/*'middleware'=>'checkIsAdmin', */'prefix'=>'admin', 'namespace' => 'Admin'],function(){
	Route::resource('events', 'EventController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
	Route::resource('tournaments', 'TournamentController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
	Route::resource('sports', 'SportController');
	Route::resource('courts', 'CourtController');
	Route::resource('teams', 'TeamController');
	Route::resource('participants', 'ParticipantController');
	Route::resource('teams.participants', 'TeamParticipantController', ['only' => ['destroy', 'store']]);
});



Route::resource('events.import', 'EventImportController', ['only' => ['store']]);
