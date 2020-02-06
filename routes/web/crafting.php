<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => []], function () {
    Route::get('/crafting/calculator', 'CraftingController@calculator')->name('crafting.calculator');
});
