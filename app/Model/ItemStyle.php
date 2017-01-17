<?php namespace App\Model;

use HeppyKarlsson\Sluggify\Traits\Sluggify;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property bool craftable
 * @property mixed chapters
 * @property bool isHidden
 * @property string location
 * @property string description
 * @property string name
 */
class ItemStyle extends Model
{
    use Sluggify;

    protected $sluggify = [
        'slugs' => ['slug' => 'name'],
        'routeKey' => 'slug',
    ];

    public $table = 'itemStyles';

    public function chapters() {
        return $this->hasMany(ItemStyleChapter::class, 'itemStyleId');
    }

}
