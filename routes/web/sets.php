<?php


Route::get('/sets', 'SetController@index')->name('set.index');
Route::get('/set/craftable', 'SetController@craftable')->name('set.craftable');
Route::get('/set/monster/{giver}', 'SetController@monsterChest')->name('set.monster.chest');
Route::get('/set/monster', 'SetController@monster')->name('set.monster');
Route::get('/set/{set}', 'SetController@show')->name('set.show');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/my-sets', 'SetController@mySets')->name('set.my-sets');
    Route::post('/set/{set}/update', 'SetController@update')->name('set.update');
    Route::get('/set/{set}/edit', 'SetController@edit')->name('set.edit');

});
