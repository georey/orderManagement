<?php
Route::get('/mapper', 'Mapper\MapperController@index')->name('mapper.index');
Route::get('/mapper/create', 'Mapper\MapperController@create')->name('mapper.create');
Route::post('/mapper/store', 'Mapper\MapperController@store')->name('mapper.store');
Route::delete('/mapper/destroy/{id}', 'Mapper\MapperController@destroy')->name('mapper.destroy');
Route::get('/mapper/restore/{id}', 'Mapper\MapperController@restore')->name('mapper.restore');
Route::get('/mapper/detail/{id}', 'Mapper\MapperController@detail')->name('mapper.detail');
Route::post('/mapper/storeDetail', 'Mapper\MapperController@storeDetail')->name('mapper.storeDetail');
Route::put('/mapper/updateDetail/{id}', 'Mapper\MapperController@updateDetail')->name('mapper.updateDetail');
Route::delete('/mapper/destroyDetail/{id}', 'Mapper\MapperController@destroyDetail')->name('mapper.destroyDetail');
