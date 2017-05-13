<?php

Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
Route::resource('autor', 'AuthorController');
Route::get('thesis/content/{id}', 'ThesisController@content');
Route::resource('thesis', 'ThesisController');


