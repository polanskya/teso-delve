<?php

namespace App\Jobs\Sitemap;

use App\Enum\BagType;
use App\Enum\CraftingType;
use App\Enum\ImportType;
use App\Model\Dungeon;
use App\Model\ImportRow;
use App\Model\Item;
use App\Model\ItemStyle;
use App\Model\Set;
use App\Objects\Zones;
use Carbon\Carbon;
use HeppyKarlsson\Sitemap\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Sitemap implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pages = new Collection();

        $pages->add(Page::route('import.index'));
        $pages->add(Page::route('contribute'));
        $pages->add(Page::route('about'));

        $pages->add(new Page(route('set.index')));
        $pages->add(Page::route('set.monster'));
        $pages->add(Page::route('set.craftable'));

        $sets = Set::where('lang', config('constants.default-language'))->get();
        foreach ($sets as $set) {
            $pages->add(new Page(route('set.show', [$set])));
        }

        $pages->add(Page::route('dungeons.groups.index'));
        $pages->add(Page::route('dungeons.delves.index'));
        $pages->add(Page::route('dungeons.public.index'));
        $pages->add(Page::route('dungeons.arenas.index'));
        $pages->add(Page::route('dungeons.trials.index'));

        $dungeons = Dungeon::all();
        foreach ($dungeons as $dungeon) {
            $pages->add(Page::route('dungeon.show', [$dungeon]));
        }

        $zonesObject = new Zones();
        $zones = $zonesObject->getZones();

        foreach ($zones as $zone) {
            $pages->add(Page::route('zone.show', [$zone['slug']]));
        }

        $pages->add(Page::route('item-styles.index'));

        $styles = ItemStyle::where('isHidden', 0)->get();
        foreach ($styles as $style) {
            $pages->add(Page::route('item-styles.show', [$style]));
        }

        File::put(public_path('sitemap.xml'), view('sitemap.show', compact('pages')));
    }
}
