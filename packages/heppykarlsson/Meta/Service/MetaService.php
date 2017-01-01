<?php namespace HeppyKarlsson\Meta\Service;

use HeppyKarlsson\Meta\Model\Meta;

/**
 * Created by PhpStorm.
 * User: Heppy
 * Date: 2017-01-01
 * Time: 15:39
 */
class MetaService
{

    public function update($owner, $key, $value) {
        $meta = $owner->meta->where('key', $key)->first();
        if(is_null($meta)) {
            $meta = new Meta();
        }
        $meta->key = $key;
        $meta->value = $value;
        $owner->meta()->save($meta);
    }

}