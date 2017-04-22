<?php
Route::resource('profiles', 'ProfileController');
Route::resource('employees', 'EmployeeController');
Route::resource('magazines', 'MagazineController');
Route::resource('autor', 'AuthorController');

//Creando una nueva ruta para poder eliminar las revistas
Route::get('magazines/{magazines}/destroy', 'MagazineController@destroy')->name('magazines.destroy');
Route::get('magazines/{magazines}/content', 'MagazineController@content')->name('magazines.content');
Route::get('magazines/{magazines}/itemDetail', 'MagazineController@itemDetail')->name('magazines.itemDetail');
//Ruta para poder enviar el id de la revista y mostrar los contenidos de las revistas

Route::resource('editorial', 'EditorialController');
Route::get('book/content', 'BookController@content');
Route::resource('book', 'BookController');
Route::resource('thesis', 'ThesisController');
