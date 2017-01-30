<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Navigation
 */
class Navigation extends Model
{
    protected $table = 'navigations';

    protected $primaryKey = 'navigation_id';

    public $timestamps = false;

    //protected $modelName = 'Type';

    protected $fillable = [
        'navigation_title',
        'navigation_description',
    ];

    protected $guarded = [];

    public function listitems()
    {
        return $this->hasMany('App\Models\Listitem');
    }
}