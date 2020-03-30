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
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');


            Route::group([
                'as' => 'settings.',
                'prefix' => 'settings',
            ], function() {
                Route::get('/settings', 'SettingsController@index')->name('index');
            });


            Route::resource('tournaments', 'TournamentController');
            Route::resource('groups', 'GroupController');
        });
    });
});

/**
 * Api routes
 */
Route::namespace('Api')->group(function () {
    Route::prefix('api')->group(function () {
        Route::name('api.')->group(function () {
            // Tournaments routes
            Route::prefix('tournament')->group(function () {
                Route::get('/', 'TournamentApi@index')->name('my_tournaments');
            });

            // Cities
            Route::get('/city/search/{term}', 'Cities@search')->name('search_city');

        });
    });
});
