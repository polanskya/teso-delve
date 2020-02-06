<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string guid
 * @property string row
 * @property int type
 * @property string import_group_guid
 * @property int user_id
 */
class ImportRow extends Model
{
    protected $primaryKey = 'guid';
    protected $table = 'import_row';

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
