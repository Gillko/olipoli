<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 */
class Type extends Model
{
    protected $table = 'types';

    protected $primaryKey = 'type_id';

    public $timestamps = false;

    protected $fillable = [
        'type_id',
        'type_name',
        'type_description',
    ];

    protected $guarded = [];

    public function packages()
    {
        return $this->belongsToMany('App\Models\Package', 'packages_types');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    /**
    *Get a list of package ids associated with the current type.
    *
    *@return array
    */
    public function getPackageListAttribute()
    {
        return $this->packages->pluck('package_id')->all();
    }
}