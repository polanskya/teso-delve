<?php

namespace App\Jobs\EsoImport;

use App\Model\Character;
use App\Model\CraftingTrait;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Smithings implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $lines = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function add($line)
    {
        $this->lines[] = $line;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $datasPerCharacter = collect();
        $characters = Character::where('userId', $this->user_id)
            ->get()
            ->keyBy('externalId');

        foreach ($this->lines as $line) {
            $data = explode(';', $line);
            $datasPerCharacter->push($data);
        }

        $datasPerCharacter = $datasPerCharacter->groupBy(1);

        $datasPerCharacter->each(function ($datas, $externalId) use ($characters) {
            $character = $characters->get($externalId);
            $craftingTraits = $character->craftingTraits()->get();

            foreach ($datas as $data) {
                $smithingType = intval($data[3]);

                $craftingTrait = $craftingTraits->where('craftingTypeEnum', $smithingType)
                    ->where('traitId', intval($data[7]))
                    ->where('researchLineIndex', intval($data[4]))
                    ->where('traitIndex', intval($data[5]))
                    ->first();

                if (trim($data[9]) == 'true' or (isset($data[13]) and $data[2] !== 'nil')) {
                    $craftingTrait = isset($craftingTrait) ? $craftingTrait : new CraftingTrait();
                    $craftingTrait->characterId = $character->id;
                    $craftingTrait->craftingTypeEnum = $smithingType;
                    $craftingTrait->traitId = intval($data[7]);
                    $craftingTrait->researchLineIndex = intval($data[4]);
                    $craftingTrait->traitIndex = intval($data[5]);
                    $craftingTrait->name = $data[10];
                    $craftingTrait->image = $data[11];

                    if (isset($data[13]) and $data[2] !== 'nil') {
                        $researchDone = intval($data[13]) + intval($data[2]);
                        $craftingTrait->researchDone_at = Carbon::createFromTimestamp($researchDone);
                    }

                    $craftingTrait->isKnown = stripos($data[9], 'true') !== false;
                    $craftingTrait->save();
                }
            }
        });
    }
}
