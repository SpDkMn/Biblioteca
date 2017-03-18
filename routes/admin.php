<?php
Route::get('/', 'HomeController@index');
Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
Route::resource('magazines', 'MagazineController');
Route::resource('noticias','Noticias');

