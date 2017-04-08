<?php

Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
Route::resource('editorial', 'EditorialController');
Route::resource('autor', 'AuthorController');
Route::resource('magazines', 'MagazineController');
Route::get('book/content', 'BookController@content');
Route::resource('book', 'BookController');
Route::resource('thesis', 'ThesisController');


