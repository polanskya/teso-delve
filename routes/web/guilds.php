<?php
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'guild.member']], function () {
    Route::get('/guild/{guild}/members', 'GuildController@members')->name('guilds.members');
    Route::get('/guild/{guild}/bank', 'GuildController@bank')->name('guilds.bank');
    Route::get('/guild/{guild}/sales', 'GuildController@sales')->name('guilds.sales');
    Route::get('/guild/{guild}/ranks', 'GuildController@ranks')->name('guilds.ranks');
    Route::get('/guild/{guild}', 'GuildController@show')->name('guilds.show');
});
