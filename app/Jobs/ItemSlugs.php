<?php namespace App\Jobs;

use App\Model\Item;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ItemSlugs implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $items = Item::whereNull('slug')->get();
        $updated_at = Carbon::now();

        foreach($items as $item) {
            $item->updated_at = $updated_at;
            $item->save();
        }
    }

}
