<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ajax'], function () {
    Route::get('set/{set}/favourite', 'SetController@toggleFavourite')->name('set.favourite');

    Route::get('set/{set}', 'SetController@ajaxShow')->name('set.ajaxShow');
    Route::get('item/{item}', 'ItemController@ajaxShow')->name('item.ajaxShow');
});
