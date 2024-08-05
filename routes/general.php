<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'General', 'middleware' => 'auth'], function () {

    /**
     * Dashboard page
     */
    Route::get('/', 'MainController@index')->name('main.index');

    /**
     * Logout
     */
    Route::get('/logout', 'MainController@logout')->name('main.logout');

    /**
     * History page
     */
    Route::get('history', 'HistoryController@index')->name('history.index');

    /**
     * History filtered data
     */
    Route::post('history/filter', 'HistoryController@filter')
        ->name('history.filter')
        ->middleware('ajax');
});

