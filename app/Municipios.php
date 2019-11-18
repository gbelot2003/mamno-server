<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }
}
