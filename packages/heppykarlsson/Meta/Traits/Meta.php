<?php namespace HeppyKarlsson\Meta\Traits;

trait Meta
{

    public function meta() {
//        $parent = get_called_class();
        return $this->morphMany(\HeppyKarlsson\Meta\Model\Meta::class, 'metable');
    }

    public function getMeta($key) {
        return $this->meta->where('key', $key)->first();
    }

}