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

Route::group(['middlewareGroups' => 'web'], function() {
    Route::get('/', function () {
    	return view('personal');
	});
	// Route::get('/blog','BlogsController@index');
	Route::get('/home', 'HomeController@index');
	// Route::group(['prefix' => 'blog'], function() {
	// 	Route::resource('shows','BlogsController');
	// });
	Route::group(['domain' => 'blog.personalblog.dev'], function() {
	    Route::get('','BlogsController@index');
	    Route::resource('shows','BlogsController');
		    Route::group(['prefix' => '/admin'], function() {
			// Route::auth();
			Route::get('/', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
			Route::post('postlogin', ['as' => 'auth.postlogin', 'uses' => 'Auth\AuthController@login']);
			Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

			// // // Registration Routes...
			// // Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
			// // Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

			// // Password Reset Routes...
			// Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
			// Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
			// Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
			Route::group(['middleware' => ['auth','role:admin']], function() {
				Route::resource('dashboard','AdminController');
				Route::resource('articles', 'ArticleController');
				Route::resource('tags', 'TagsController');
			});
		});
	});
});

