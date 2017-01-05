<?php

$middlewares = [
    'auth',
    \App\Http\Middleware\Admin::class,
];

Route::group(['prefix' => 'admin', 'middleware' => $middlewares], function () {
    Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('ghost/{user}', 'Admin\UserController@ghost')->name('admin.users.ghost');
});
