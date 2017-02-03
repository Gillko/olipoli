<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 */
class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    public $timestamps = false;

    protected $fillable = [
        'contact_company',
        'contact_phoneA',
        'contact_phoneB',
        'contact_email',
        'contact_information',
        'contact_anchor'
    ];

    protected $guarded = [];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}