<?php namespace HeppyKarlsson\EsoImport;

use App\Jobs\EsoImport\Items;
use App\Jobs\EsoImport\Smithings;

class ImportService
{
    private $items = [];
    private $dispatch = false;
    private $smithings = null;

    const ITEM_COUNT = 500;

    public function __construct($user_id)
    {
        $this->smithings = new Smithings($user_id);
    }


    public function item($line, $user_id) {
        $this->items[] = $line;

        if(count($this->items) > $this::ITEM_COUNT) {
            $this->executeItems($user_id);

        }
    }

    public function smithing($line) {
        $this->smithings->add($line);
    }

    public function executeSmithing() {
        dispatch($this->smithings);
        $this->smithings = null;
    }

    public function executeItems($user_id) {
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

        $job = null;

        return true;
    }

}
