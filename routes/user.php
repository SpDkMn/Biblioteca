<?php


Route::resource('order', 'OrderController');
Route::resource('search', 'SearchController');

Route::post('search2/busquedaLibro', 'Search2Controller@busquedaLibro')->name('search2.busquedaLibro');
Route::resource('search2', 'Search2Controller');
