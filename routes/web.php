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

		Route::group(['prefix' => 'nha-nghi-khach-san'], function() {
			Route::get('danh-sach', ['as' => 'admin.hotel.list', 'uses' => 'Admin\HotelController@showListHotels']);
			Route::get('them-moi', ['as' => 'admin.hotel.add', 'uses' => 'Admin\HotelController@showHotelFormAdd']);
			Route::post('them-moi', ['as' => 'admin.hotel.postAdd', 'uses' => 'Admin\HotelController@hotelFormAdd']);
			Route::get('thong-tin/{id}', ['as' => 'admin.hotel.edit', 'uses' => 'Admin\HotelController@showHotelFormEdit']);
			Route::match(array('PUT', 'PATCH'), 'thong-tin/{id}', ['as' => 'admin.hotel.postEdit', 'uses' => 'Admin\HotelController@hotelFormEdit']);
		});

		Route::group(['prefix' => 'tai-khoan'], function() {
			Route::get('danh-sach', ['as' => 'admin.user.list', 'uses' => 'Admin\UserController@showListUsers']);
			Route::get('them-moi', ['as' => 'admin.user.add', 'uses' => 'Admin\UserController@showUserFormAdd']);
			Route::post('them-moi', ['as' => 'admin.user.postAdd', 'uses' => 'Admin\UserController@userFormAdd']);
			Route::get('thong-tin/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@showUserFormEdit']);
			Route::match(array('PUT', 'PATCH'), 'thong-tin/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'Admin\UserController@userFormEdit']);
			Route::get('khoa/{id}', ['as' => 'admin.user.suspend', 'uses' => 'Admin\UserController@suspendUser']);
			Route::get('xoa/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@deleteUser']);
			Route::post('anh-dai-dien/{id}', ['as' => 'admin.user.uploadAvatar', 'uses' => 'Admin\UserController@uploadAvatar']);
			Route::post('doi-mat-khau/{id}', ['as' => 'admin.user.changePassword', 'uses' => 'Admin\UserController@changePassword']);
		});

		Route::get('thong-bao', ['as' => 'admin.notice', 'uses' => 'Admin\NoticeController@showListNotice']);
		Route::get('thong-bao/{id}', ['as' => 'admin.notice.link', 'uses' => 'Admin\NoticeController@renderNoticeLink']);
	});
});

Route::get('/dang-nhap', ['as' => 'user.login', 'uses' => 'LoginController@showLoginForm']);
Route::post('/dang-nhap', ['as' => 'user.login', 'uses' => 'LoginController@login']);
Route::post('/dang-xuat', ['as' => 'user.logout', 'uses' => 'LoginController@logout']);