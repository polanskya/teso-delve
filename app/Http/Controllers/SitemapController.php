<?php namespace App\Http\Controllers;

use App\Jobs\Sitemap\Items;
use App\Jobs\Sitemap\Sitemap;

class SitemapController
{

   public function build() {

       $sitemap = new Sitemap();
       dispatch($sitemap);

       $items = new Items();
       dispatch($items);

    }




}