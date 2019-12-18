<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Configuration extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    
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
