<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

include('ajax.php');
include('admin.php');

Route::get('/import-data', 'ImportController@import');
Route::get('/export', 'ImportController@export');

Route::get('/esoui/art/icons/{image}', 'EsouiController@image');

Route::get('/character/{character}', 'CharacterController@show')->name('characters.show');
Route::get('/character/{character}/crafting/{craftingTypeEnum}', 'CharacterController@craftingResearch')->name('character.crafting');
Route::get('/character/{character}/motifs', 'CharacterController@itemStyles')->name('character.itemstyles');
Route::get('/characters', 'CharacterController@index')->name('characters.index')->middleware('auth');

Route::get('/character/{character}/inventory', 'CharacterController@inventory')->name('character.inventory')->middleware('auth');

Route::get('/bank', 'BankController@index')->name('bank.index');

Route::get('/dungeons', 'DungeonController@index')->name('dungeons.index');
Route::put('/dungeon/{dungeon}/set', 'DungeonController@addSet')->name('dungeon.addSet')->middleware('auth');
Route::get('/dungeon/{dungeon}', 'DungeonController@show')->name('dungeon.show');
Route::get('/dungeon/{dungeon}/edit', 'DungeonController@edit')->name('dungeon.edit');
Route::post('/dungeon/{dungeon}', 'DungeonController@update')->name('dungeon.update');

Route::get('/zones', 'ZoneController@index')->name('zones.index');
Route::get('/zone/{zoneId}', 'ZoneController@show')->name('zone.show');


Route::get('/styles', 'StyleController@index')->name('item-styles.index');
Route::get('/style/{itemStyle}', 'StyleController@show')->name('item-styles.show');


Route::get('/my-sets', 'SetController@mySets')->name('set.my-sets')->middleware('auth');
Route::get('/set/craftable', 'SetController@craftable')->name('set.craftable');
Route::get('/set/monster', 'SetController@monster')->name('set.monster');
Route::get('/set/{set}', 'SetController@show')->name('set.show');
Route::post('/set/{set}/update', 'SetController@update')->name('set.update')->middleware('auth');
Route::get('/set/{set}/edit', 'SetController@edit')->name('set.edit')->middleware('auth');

Route::get('/contribute', 'ContributeController@index')->name('contribute');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/item/{item}', 'ItemController@show')->name('item.show');

Route::post('/import-data', 'ImportController@upload')->name('import.upload');
Route::get('/import', 'ImportController@index')->name('import.index');

Route::get('/home', 'SetController@mySets')->name('home.index')->middleware('auth');
Route::get('/', 'HomeController@index');

