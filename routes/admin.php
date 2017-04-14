<?php

Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
Route::resource('autor', 'AuthorController');
Route::get('thesis/content', 'ThesisController@content');
Route::resource('thesis', 'ThesisController');


