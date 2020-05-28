<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 */
class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'item_id';

    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'item_description',
        'type_id'
    ];

    protected $guarded = [];

    public function packages()
    {
        return $this->belongsToMany('App\Models\Package', 'items_packages');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
    *Get a list of package ids associated with the current item.
    *
    *@return array
    */
    public function getPackageListAttribute()
    {
        return $this->packages->pluck('package_id')->all();
    }
}