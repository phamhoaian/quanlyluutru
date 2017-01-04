<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/home', 'HomeController@index');

	Route::group(['prefix' => 'quan-ly', 'middleware' => 'role'], function() {
		Route::get('tong-quan', function() {
		    //
		});

		Route::group(['prefix' => 'tai-khoan'], function() {
			Route::get('danh-sach', 'Admin\UserController@showListUsers');
		});
	});
});

Route::get('/dang-nhap', 'LoginController@showLoginForm');
Route::post('/dang-nhap', 'LoginController@login');
Route::post('/dang-xuat', 'LoginController@logout');