<?php
use Illuminate\Support\Facades\Route;


Route::get('/inventory', 'InventoryController@index')->name('inventory.index');
