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

Route::get('/busqueda', function () {

   $books = DB::Select("Select id From search_items Where Match(content) AGAINST('analisis')");
	dd($books);

});
Route::get('/', function () {
	return view('auth/login');
});
Route::get('/prueba', function () {
	return view('user2.md_noticias.index');
});

Auth::routes();
Route::get('/admin', 'HomeController@index');
Route::get('/user', 'HomeController@indexUser');
