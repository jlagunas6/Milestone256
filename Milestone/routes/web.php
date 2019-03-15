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

//takes user to registration page
Route::get('/register', 'PagesController@Register');
//registers the user; registration controller
Route::post('/doregister', 'RegistrationController@Register');

//takes user to their profile
//TODO::profile page
//takes user to edit contact information
Route::get('/editContact', 'PagesController@editContact');
//updates users contact information
Route::post('/updateContact', 'ProfileController@updateContact');

//take admin to see all users
Route::get('/allUsers', 'AdminController@allUsers');


Route::get('/allusers', 'PagesController@allusers');

