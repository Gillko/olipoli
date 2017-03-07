<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Picture
 */
class Social extends Model
{
    protected $table = 'socials';

    protected $primaryKey = 'social_id';

    public $timestamps = false;

    protected $fillable = [
        'social_fontawesome',
        'social_link',
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