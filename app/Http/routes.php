<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('personal');
});
Route::get('/blog','BlogsController@index');
// Route::get('/blog/admin','BlogsController@index');
Route::get('/blog/admin', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);


// Route::auth();

Route::get('/home', 'HomeController@index');
