<?php


Route::get('/settings', 'User\SettingController@edit')->name('user.settings.edit');
Route::post('/settings', 'User\SettingController@update')->name('user.settings.update');
