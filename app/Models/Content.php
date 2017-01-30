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
        'content_button'
    ];

    protected $guarded = [];

    public function pictures()
    {
        return $this->hasMany('App\Models\Picture');
    }
}