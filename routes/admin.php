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
Route::post('prestamos/prestar', 'PrestamoController@prestar')->name('prestamos.prestar');
Route::post('prestamos/rechazar', 'PrestamoController@rechazar')->name('prestamos.rechazar');
Route::post('prestamos/devolver', 'PrestamoController@devolver')->name('prestamos.devolver');
Route::resource('prestamos', 'PrestamoController');
Route::post('prestamos', 'PrestamoController@index');

Route::resource('pedido', 'LoanController');
Route::post('pedido', 'LoanController@index');


// RUTA PARA LOS PERFILES
Route::resource('profiles', 'ProfileController');

// RUTA PARA LAS NOTICIAS
Route::resource('/noticias', 'Noticias');

// RUTA PARA LOS USUARIOS
Route::resource('/usuarios', 'usuarios');

// RUTA PARA LAS CONFIGURACIONES
Route::resource('configurations', 'ConfigurationController');

// RUTA PARA LAS ESTADISTICAS
Route::resource('statistics', 'ChartController');


//RUTA PARA LAS SANCIONES
Route::resource('/sanciones','PenaltyController');
Route::get('/sanciones/{idSancion}/modalVerSancion', function ($id) {
    $Sancion=App\Penalty::with(['penaltyOrder'])->with(['user'])->find($id);
         return view('admin.md_sanciones.modalVerSancion',[
             'Sancion' => $Sancion
          ]);
    });

//RUTA PARA LOS TIPOS DE SANCIONES
Route::resource('/tiposanciones','TypePenaltyController');
Route::get('/tiposanciones/{idorden}/modal', function ($id) {
	$tipoSancion=App\TypePenalty::with(['penaltyOrders'])->find($id);
         return view('admin.md_tiposanciones.modal',[
             'tipoSancion' => $tipoSancion
          ]);
    });
Route::get('/tiposanciones/{idtipo}/guardarcambio',function ($id){
	$tipoSancion=App\TypePenalty::with(['penaltyOrders'])->find($id);
	return view('admin.md_tiposanciones.guardarCambio',[
             'tipoSancion' => $tipoSancion,
             'myJson'=>$_REQUEST['myJson']
             ]);
});
Route::get('/tiposanciones/{idorden}/anadirorden', 'TypePenaltyController@anadirOrden')->name('tiposanciones.anadirOrden');
Route::get('/tiposanciones/{idorden}/quitarorden', 'TypePenaltyController@quitarOrden')->name('tiposanciones.quitarOrden');
Route::get('/tiposanciones/{idorden}/guardarcambio', 'TypePenaltyController@guardarCambio')->name('tiposanciones.guardarCambio');


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
