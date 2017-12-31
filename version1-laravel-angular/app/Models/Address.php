<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 */
class Address extends Model
{
    protected $table = 'addresses';

    protected $primaryKey = 'address_id';

    public $timestamps = false;

    protected $fillable = [
        'address_street',
        'address_number',
        'address_city',
        'address_postalcode',
        'address_latitude',
        'address_longitude',
        'contact_id'
    ];

    protected $guarded = [];

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    /**
    *Get a list of content ids associated with the current picture.
    *
    *@return array
    */
    public function getAddressListAttribute()
    {
        return $this->addresses->pluck('address_id')->all();
    }
}