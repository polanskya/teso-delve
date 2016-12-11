<?php

Route::group(['prefix' => 'ajax'], function () {
    Route::get('set/{set}/favourite', 'SetController@toggleFavourite')->name('set.favourite');
});