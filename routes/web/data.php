<?php
Route::get('/data/upload', 'Data\FileController@index')->name('data.file.index');
Route::post('/data/upload', 'Data\FileController@upload')->name('data.file.upload');

Route::get('/data/orders', 'Data\OrderController@index')->name('data.orders.index');
Route::get('/data/orders/set/{id}/{order_status_id}', 'Data\OrderController@setOrder')->name('data.orders.set');
