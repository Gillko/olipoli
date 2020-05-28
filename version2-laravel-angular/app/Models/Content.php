<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Content
 */
class Content extends Model
{
    protected $table = 'contents';

    protected $primaryKey = 'content_id';

    public $timestamps = false;

    //protected $modelName = 'Type';

    protected $fillable = [
        'content_title',
        'content_subtitle',
        'content_description',
        'content_anchor',
        'content_button',
        'content_buttonAnchor',
        'content_position',
        'content_background',
        'content_type'
    ];

    protected $guarded = [];

    public function pictures()
    {
        return $this->hasMany('App\Models\Picture');
    }

    public function socials()
    {
        return $this->hasMany('App\Models\Social');
    }
}