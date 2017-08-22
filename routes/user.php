<?php


Route::resource('order', 'OrderController');
//Pedidos -> por separado
Route::resource('orderBook', 'OrderBookController');
Route::resource('orderMagazine', 'OrderMagazineController');
Route::resource('orderThesis', 'OrderThesisController');



Route::resource('search', 'SearchController');


//Pedidos -> version alternativa
Route::get('search2/indexLibro', 'Search2Controller@indexLibro')->name('search2.indexLibro');
Route::post('search2/busquedaLibro', 'Search2Controller@busquedaLibro')->name('search2.busquedaLibro');
Route::resource('search2', 'Search2Controller');
