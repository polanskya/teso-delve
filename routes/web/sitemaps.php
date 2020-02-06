<?php

use Illuminate\Support\Facades\Route;

Route::get('/build-sitemaps', 'SitemapController@build')->name('sitemap.build');
