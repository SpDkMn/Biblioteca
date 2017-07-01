<?php
Route::resource('autor', 'AuthorController');

Route::resource('book', 'BookController');
Route::get('book/content', 'BookController@content');

Route::resource('editorial', 'EditorialController');
Route::resource('employees', 'EmployeeController');
Route::resource('autor', 'AuthorController');
Route::get('thesis/content/{id}', 'ThesisController@content');
Route::resource('thesis', 'ThesisController');
Route::resource('magazines', 'MagazineController');
//Creando una nueva ruta para poder eliminar las revistas
Route::get('magazines/{magazines}/destroy', 'MagazineController@destroy')->name('magazines.destroy');
Route::get('magazines/{magazines}/content', 'MagazineController@content')->name('magazines.content');
Route::get('magazines/{magazines}/itemDetail', 'MagazineController@itemDetail')->name('magazines.itemDetail');

Route::resource('profiles', 'ProfileController');
Route::resource('thesis', 'ThesisController');
Route::get('thesis/content', 'ThesisController@content');

//Parte de Giordano
Route::resource('/noticias','Noticias');


Route::resource('configurations', 'ConfigurationController');