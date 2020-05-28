<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Picture
 */
class Picture extends Model
{
    protected $table = 'pictures';

    protected $primaryKey = 'picture_id';

    public $timestamps = false;

    protected $fillable = [
        'picture_title',
        'picture_description',
        'picture_alt',
        'picture_url',
        'picture_type',
        //'content_id'
    ];

    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo('App\Models\Content');
    }

    /**
    *Get a list of content ids associated with the current picture.
    *
    *@return array
    */
    public function getContentListAttribute()
    {
        return $this->contents->pluck('content_id')->all();
    }
}