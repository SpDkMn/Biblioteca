<?php
Route::resource('editorial', 'EditorialController');
Route::resource('employees', 'EmployeeController');

// RUTA PARA LOS AUTORES
Route::resource('autor', 'AuthorController');

// RUTA PARA LA TESIS
Route::get('thesis/content/{id}', 'ThesisController@content');
Route::resource('thesis', 'ThesisController');
Route::get('thesis/content', 'ThesisController@content');

// RUTA PARA LAS REVISTAS
Route::resource('magazines', 'MagazineController');
Route::get('magazines/{magazines}/destroy', 'MagazineController@destroy')->name('magazines.destroy');
Route::get('magazines/{magazines}/content', 'MagazineController@content')->name('magazines.content');
Route::get('magazines/{magazines}/itemDetail', 'MagazineController@itemDetail')->name('magazines.itemDetail');

// RUTA PARA LOS COMPENDIOS
Route::resource('compendium', 'CompendiumController');
Route::get('compendium/{compendium}/destroy', 'CompendiumController@destroy')->name('compendium.destroy');
Route::get('compendium/{compendium}/content', 'CompendiumController@content')->name('compendium.content');
Route::get('compendium/{compendium}/introduccion', 'CompendiumController@introduccion')->name('compendium.introduccion');
Route::get('compendium/{compendium}/itemDetail', 'CompendiumController@itemDetail')->name('compendium.itemDetail');
// RUTA PARA LOS PRESTAMOS
Route::resource('prestamos', 'LoanController');


// RUTA PARA LOS PERFILES
Route::resource('profiles', 'ProfileController');

// RUTA PARA LAS NOTICIAS
Route::resource('/noticias', 'Noticias');

// RUTA PARA LOS USUARIOS
Route::resource('/usuarios', 'usuarios');

// RUTA PARA LAS CONFIGURACIONES
Route::resource('configurations', 'ConfigurationController');

// RUTA PARA LOS PEDIDOS



Route::resource('userTypes', 'userTypeController');
// RUTA PARA LOS LIBROS
Route::resource('book', 'BookController');
Route::get('book/show', 'BookController@show')->name('book.show');
Route::get('book/{book}/show2', 'BookController@show2')->name('book.show2');
Route::get('book/{book}/show3', 'BookController@show3')->name('book.show3');

Route::get('cargaEventos{id?}','CalendarController@index');
Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));
Route::post('actualizaEventos','CalendarController@update');
Route::post('eliminaEvento','CalendarController@delete');
