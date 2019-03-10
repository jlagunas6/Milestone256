<?php

use App\Http\Controllers;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

//to do pages, leads no where
Route::get('/blank', function () {
    return view('blank');
});

//primary page user will see
Route::get('/', 'PagesController@Index');

//takes user to the login page
Route::get('/login', 'PagesController@Login');
//logs the user in; login controller
Route::post('/dologin', 'LoginController@Authenticate');
//logs user out
Route::get('/logout', 'LoginController@logout');


Route::get('/allusers', 'PagesController@allusers');

