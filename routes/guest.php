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

Route::group(['namespace' => 'Guest'], function () {

    /**
     * Login page
     */
    Route::get('login', 'AuthController@index')->name('login');

    /**
     * Auth route
     */
    Route::post('login/store', 'AuthController@login')->name('login.store');
});

