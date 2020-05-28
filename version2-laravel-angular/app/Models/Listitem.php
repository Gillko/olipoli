<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listitem
 */
class Listitem extends Model
{
    protected $table = 'listitems';

    protected $primaryKey = 'listitem_id';

    public $timestamps = false;

    protected $fillable = [
        'listitem_title',
        'listitem_description',
        'listitem_anchor',
        'listitem_position',
        'navigation_id'
    ];

    protected $guarded = [];

    public function navigation()
    {
        return $this->belongsTo('App\Models\Navigation');
    }

    /**
    *Get a list of package ids associated with the current item.
    *
    *@return array
    */
    public function getNavigationListAttribute()
    {
        return $this->navigations->pluck('navigation_id')->all();
    }
}