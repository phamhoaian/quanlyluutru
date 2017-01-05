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
			Route::get('danh-sach', ['as' => 'admin.user.list', 'uses' => 'Admin\UserController@showListUsers']);
			Route::get('them-moi', ['as' => 'admin.user.add', 'uses' => 'Admin\UserController@showUserFormAdd']);
			Route::post('them-moi', ['as' => 'admin.user.postAdd', 'uses' => 'Admin\UserController@userFormAdd']);
			Route::get('thong-tin/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@showUserFormEdit']);
			Route::post('thong-tin/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'Admin\UserController@userFormEdit']);
			Route::get('khoa/{id}', ['as' => 'admin.user.suspend', 'uses' => 'Admin\UserController@suspendUser']);
			Route::get('xoa/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@deleteUser']);
		});
	});
});

Route::get('/dang-nhap', 'LoginController@showLoginForm');
Route::post('/dang-nhap', 'LoginController@login');
Route::post('/dang-xuat', 'LoginController@logout');