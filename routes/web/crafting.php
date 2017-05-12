<?php


Route::group(['middleware' => []], function () {


    Route::get('/crafting/calculator', 'CraftingController@calculator')->name('crafting.calculator');

});
