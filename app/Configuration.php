<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'value', 'display'];

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $casts = [
        'display' => 'boolean'
    ];
}
