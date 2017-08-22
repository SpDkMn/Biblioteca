<?php
//Pedidos -> por separado
Route::resource('orderBook', 'OrderBookController');
Route::resource('orderMagazine', 'OrderMagazineController');
Route::resource('orderThesis', 'OrderThesisController');
// Agregando los metodos para los pedidos
// Route::post('search/busquedaLibro', 'SearchController@busquedaLibro')->name('search.busquedaLibro');
// Route::post('search/busquedaThesis', 'SearchController@busquedaThesis')->name('search.busquedaThesis');
// Route::post('search/busquedaRevista', 'SearchController@busquedaRevista')->name('search.busquedaRevista');
// Route::resource('search', 'SearchController');


//Pedidos -> version alternativa
Route::get('search2/indexLibro', 'Search2Controller@indexLibro')->name('search2.indexLibro');
Route::post('search2/busquedaLibro', 'Search2Controller@busquedaLibro')->name('search2.busquedaLibro');
Route::resource('search2', 'Search2Controller');
