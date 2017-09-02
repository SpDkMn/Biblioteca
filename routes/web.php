<?php

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

Route::get('/', function () {
	return view('user2.md_noticias.index');
});

Route::get('/loginEmpleado', function () {
	return view('auth/login');
});


Route::post('user/login', 'LoginController@login')->name('loginUser.login');

Auth::routes();
Route::get('/admin', 'HomeController@index');
Route::get('/user', 'HomeController@indexUser');
