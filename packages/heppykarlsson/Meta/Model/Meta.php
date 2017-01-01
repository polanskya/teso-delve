<?php namespace HeppyKarlsson\Meta\Model;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public $table = 'metables';

    public function metable()
    {
        return $this->morphTo();
    }


}