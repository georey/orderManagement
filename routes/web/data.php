<?php
Route::get('/data/upload', 'Data\FileController@index')->name('data.file.index');
Route::post('/data/upload', 'Data\FileController@upload')->name('data.file.upload');

Route::get('/data/orders', 'Data\OrderController@index')->name('data.orders.index');
Route::get('/data/orders/set/{id}/{status}', 'Data\OrderController@setOrder')->name('data.orders.set');
