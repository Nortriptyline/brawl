<?php

use App\Http\Controllers\Admin\TournamentController;
use App\Http\Resources\Tournament;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------
$(document).ready(function () {

});
------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::group([
    'as' => 'settings.',
    'prefix' => 'settings',
], function () {
    Route::get('/settings', 'SettingsController@index')->name('index');
});

Route::get('/tournaments/trashed', 'TournamentController@trashed')->name('tournaments.trashed');
Route::put('/tournaments/trash/{tournament}', 'TournamentController@trash')->name('tournaments.trash');
Route::put('/tournaments/restore/{id}', 'TournamentController@restore')->name('tournaments.restore');
Route::get('/tournament/dashboard', 'TournamentController@dashboard')->name('tournaments.dashboard');
Route::resource('tournaments', 'TournamentController');

Route::resource('groups', 'GroupController');

/**
 * Api routes
 */
Route::namespace('Api')->group(function () {
    Route::prefix('api')->group(function () {
        Route::name('api.')->group(function () {
            // Tournaments routes
            Route::prefix('tournament')->group(function () {
                Route::get('/me', 'TournamentApi@index')->name('my_tournaments');
                Route::get('/me/trash', 'TournamentApi@trashed')->name('my_tournaments_trash');
                Route::get('/recents', 'TournamentApi@recents')->name('tournaments.recent');
                Route::get('/search/{term?}', 'TournamentApi@search')->name('tournaments.search');
            });

            // Cities
            Route::get('/city/search/{term}', 'Cities@search')->name('search_city');
        });
    });
});
