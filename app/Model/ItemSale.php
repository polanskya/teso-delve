<?php

namespace App\Model;

use App\Traits\EloquentGetTableNameTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
    use EloquentGetTableNameTrait;

    public $timestamps = true;

    public $dates = [
        'sold_at',
    ];

    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }

    public function scopeBetween($query, Carbon $start, Carbon $end)
    {
        return $query->where('sold_at', '>=', $start)
            ->where('sold_at', '<=', $end);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function guid()
    {
        if (isset($this->attributes['guid'])) {
            return $this->attributes['guid'];
        }

        $itemString = implode(':', [
            $this->sold_at->timestamp,
            $this->item_key,
            $this->link_id,
            $this->seller,
            $this->buyer,
            $this->item_id,
            $this->price,
            crc32($this->itemLink),
            $this->isKiosk,
        ]);

        $this->attributes['guid'] = $itemString;

        return $this->attributes['guid'];
    }
}
