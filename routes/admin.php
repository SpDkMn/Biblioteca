<?php
Route::resource('autor', 'AuthorController');

Route::resource('book', 'BookController');
Route::get('book/content', 'BookController@content');

Route::resource('editorial', 'EditorialController');
Route::resource('employees', 'EmployeeController');

Route::resource('magazines', 'MagazineController');
//Creando una nueva ruta para poder eliminar las revistas
Route::get('magazines/{magazines}/destroy', 'MagazineController@destroy')->name('magazines.destroy');
Route::get('magazines/{magazines}/content', 'MagazineController@content')->name('magazines.content');
Route::get('magazines/{magazines}/itemDetail', 'MagazineController@itemDetail')->name('magazines.itemDetail');


Route::resource('compendium', 'CompendiumController');
//Creando una nueva ruta para poder eliminar las revistas
Route::get('compendium/{compendium}/destroy', 'CompendiumController@destroy')->name('compendium.destroy');
Route::get('compendium/{compendium}/content', 'CompendiumController@content')->name('compendium.content');
Route::get('compendium/{compendium}/itemDetail', 'CompendiumController@itemDetail')->name('compendium.itemDetail');



Route::resource('profiles', 'ProfileController');
Route::resource('thesis', 'ThesisController');
Route::get('thesis/content', 'ThesisController@content');
