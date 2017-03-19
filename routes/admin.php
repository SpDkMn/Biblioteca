<?php
Route::get('/', 'HomeController@index');
Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
<<<<<<< HEAD
Route::resource('magazines', 'MagazineController');
Route::resource('noticias','Noticias');
=======
Route::resource('autor', 'AuthorController');
Route::resource('tesis', 'ThesisController');
>>>>>>> refs/remotes/origin/joseG-autoress

