<?php

namespace App\Jobs\Sitemap;

use App\Enum\BagType;
use App\Enum\CraftingType;
use App\Enum\ImportType;
use App\Model\ImportRow;
use App\Model\Item;
use Carbon\Carbon;
use HeppyKarlsson\Sitemap\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Items implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = public_path('items.xml');

        File::put($file, view('sitemap.header'));

        Item::chunk(500, function ($items) use ($file) {
            $pages = new Collection();
            foreach ($items as $item) {
                $pages->add(Page::route('item.show', [$item]));
            }

            File::append($file, view('sitemap.item', compact('pages')));
        });

        File::append($file, view('sitemap.footer'));
    }
}
