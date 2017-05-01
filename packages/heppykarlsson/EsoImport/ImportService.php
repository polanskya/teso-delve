<?php namespace HeppyKarlsson\EsoImport;

use App\Jobs\EsoImport\Items;

class ImportService
{
    private $items = [];
    private $dispatch = false;

    const ITEM_COUNT = 750;

    public function item($line, $user_id) {
        $this->items[] = $line;

        if(count($this->items) > $this::ITEM_COUNT) {
            $this->exceuteItems($user_id);

        }
    }

    public function exceuteItems($user_id) {
        $items = $this->items;
        $this->items = [];
        if(count($items) == 0) {
            return true;
        }

        $job = new Items($items, $user_id);

        if($this->dispatch) {
            dispatch($job);
        }
        else {
            $job->handle();
        }

        return true;
    }

}
