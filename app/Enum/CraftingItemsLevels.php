<?php

namespace App\Enum;

class CraftingItemsLevels
{
    private $levels = [];

    public function __construct()
    {
        $this->levels[] = [1, null];
        $this->levels[] = [4, null];

        for ($i = 6; $i <= 50; $i = $i + 2) {
            $this->levels[] = [$i, null];
        }

        for ($i = 10; $i <= 160; $i = $i + 10) {
            $this->levels[] = [50, $i];
        }
    }

    public function levels()
    {
        return $this->levels;
    }
}
