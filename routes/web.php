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

include('web/ajax.php');
include('web/sitemaps.php');

Route::get('/dungeon/public', 'DungeonController@index')->name('dungeons.public.index');
Route::get('/dungeon/group', 'DungeonController@index')->name('dungeons.groups.index');
Route::get('/dungeon/trials', 'DungeonController@index')->name('dungeons.trials.index');
Route::get('/dungeon/delves', 'DungeonController@index')->name('dungeons.delves.index');
Route::get('/dungeon/arenas', 'DungeonController@index')->name('dungeons.arenas.index');

include('web/sets.php');

Route::group(['middleware' => 'auth'], function () {
    include('web/inventory.php');
    include('web/guilds.php');
    include('admin.php');
});

Route::get('/import-data', 'ImportController@import');
Route::get('/export', 'ImportController@export');

Route::get('/esoui/art/icons/{image}', 'EsouiController@image');

Route::get('/character/{character}/delete', 'CharacterController@delete')->name('characters.delete');
Route::get('/character/{character}/restore', 'CharacterController@restore')->name('characters.restore');
Route::get('/character/{character}', 'CharacterController@show')->name('characters.show');
Route::get('/character/{character}/crafting/{craftingTypeEnum}', 'CharacterController@craftingResearch')->name('character.crafting');
Route::get('/character/{character}/motifs', 'CharacterController@itemStyles')->name('character.itemstyles');
Route::get('/characters/deleted', 'CharacterController@indexDeleted')->name('characters.index.deleted')->middleware('auth');
Route::get('/characters', 'CharacterController@index')->name('characters.index')->middleware('auth');

Route::get('/character/{character}/inventory', 'CharacterController@inventory')->name('character.inventory')->middleware('auth');

Route::get('/bank', 'BankController@index')->name('bank.index');

Route::get('/dungeons', 'DungeonController@index')->name('dungeons.index');
Route::put('/dungeon/{dungeon}/set', 'DungeonController@addSet')->name('dungeon.addSet')->middleware('auth');
Route::get('/dungeon/{dungeon}', 'DungeonController@show')->name('dungeon.show');

Route::get('/zones', 'ZoneController@index')->name('zones.index');
Route::get('/zone/{zoneId}', 'ZoneController@show')->name('zone.show');


Route::get('/styles', 'StyleController@index')->name('item-styles.index');
Route::get('/style/{itemStyle}', 'StyleController@show')->name('item-styles.show');


Route::get('/contribute', 'ContributeController@index')->name('contribute');
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/item/{item}', 'ItemController@show')->name('item.show');

Route::post('/import-data', 'ImportController@upload')->name('import.upload');
Route::get('/import', 'ImportController@index')->name('import.index');

Route::get('/home', 'SetController@mySets')->name('home.index')->middleware('auth');
Route::get('/', 'HomeController@index');
