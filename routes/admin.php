<?php

$middlewares = [
    'auth',
    \App\Http\Middleware\Admin::class,
];

Route::group(['prefix' => 'admin', 'middleware' => $middlewares], function () {
    Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('ghost/{user}', 'Admin\UserController@ghost')->name('admin.users.ghost');
    Route::get('download-dump/{user}', 'Admin\UserController@downloadLua')->name('admin.users.download-dump');

    Route::get('crafting/motifs', 'Admin\CraftingController@itemStyles')->name('admin.crafting.itemstyles');
    Route::get('crafting/motifs/{itemStyle}', 'Admin\CraftingController@itemStyle')->name('admin.crafting.item-style.edit');
    Route::post('crafting/motifs/upload-images/{itemStyle}', 'Admin\CraftingController@uploadImages')->name('admin.crafting.item-style.upload-images');
    Route::post('crafting/motifs', 'Admin\CraftingController@updateStyles')->name('admin.crafting.updateStyles');
    Route::post('crafting/motifs/{itemStyle}', 'Admin\CraftingController@updateItemStyle')->name('admin.crafting.item-style.update');

    Route::get('generate-slugs', 'Admin\SlugController@generateSlugs')->name('admin.generate-slugs');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('dungeon/{dungeon}/edit', 'DungeonController@edit')->name('admin.dungeon.edit');


    Route::get('boss/create', 'Admin\BossController@create')->name('admin.boss.create');
    Route::get('boss/{boss}/edit', 'Admin\BossController@edit')->name('admin.boss.edit');
    Route::get('boss/{boss}/delete', 'Admin\BossController@delete')->name('admin.boss.delete');
    Route::put('boss/{boss}', 'Admin\BossController@update')->name('admin.boss.update');
    Route::post('boss', 'Admin\BossController@store')->name('admin.boss.store');
});
