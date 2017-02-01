<?php namespace App\Jobs\EsoImport;

use App\Enum\ImportType;
use App\Enum\ItemType;
use App\Model\ImportGroup;
use App\Model\UserItem;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Initialize implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $file;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $importGroup = sha1($this->file . Carbon::now() . $this->user->id);
        UserItem::where('userId', $this->user->id)->delete();
        ImportGroup::where('user_id', $this->user->id)->delete();

        $ig = new ImportGroup();
        $ig->guid = $importGroup;
        $ig->user_id = $this->user->id;
        $ig->file = $this->file;

        $ig->characters = 0;
        $ig->items = 0;
        $ig->itemStyles = 0;
        $ig->smithing = 0;

        $ig->save();
        $jobs = new Collection();

        foreach(file($this->file) as $line) {
            if($this->contains($line, 'CHARACTER:')) {
                $character = new Character($line, $this->user, $importGroup);
                $ig->characters++;
                dispatch($character->onQueue('high'));
            }
        }

        foreach(file($this->file) as $line) {
            if($this->contains($line, 'ITEM:')) {
                $jobs->add(new Item($line, $this->user, $importGroup));
                $ig->items++;
            }

            if($this->contains($line, 'ITEMSTYLE:')) {
                $jobs->add(new ItemStyle($line, $this->user, $importGroup));
                $ig->itemStyles++;
            }

            if($this->contains($line, 'SMITHING:')) {
                $jobs->add(new Smithing($line, $this->user, $importGroup));
                $ig->smithing++;
            }

        }

        $ig->save();

        $jobs->each(function($job) {
           dispatch($job);
        });
    }

    public function contains($line, $key) {
        return stripos($line, $key) !== false;
    }
}
