<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Package
 */
class Package extends Model
{
    protected $table = 'packages';

    protected $primaryKey = 'package_id';

    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'package_name',
        'package_description',
        'package_conditions',
        'package_price',
    ];

    protected $guarded = [];

    public function types()
    {
        return $this->belongsToMany('App\Models\Type', 'packages_types');
    }

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'items_packages');
    }

    /**
    *Get a list of type ids associated with the current package.
    *
    *@return array
    */
    public function getTypeListAttribute()
    {
        return $this->types->pluck('type_id')->all();
    }

    /**
    *Get a list of item ids associated with the current package.
    *
    *@return array
    */
    public function getItemListAttribute()
    {
        return $this->items->pluck('item_id')->all();
    }
}