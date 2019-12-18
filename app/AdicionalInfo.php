<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AdicionalInfo extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    /**
     * @var array .
     */
    protected $fillable = ['identidad', 'rtn', 'rtn_image', 'grupo_id', 'cuenta_image', 'descripcion_vehiculos',
        'contrato', 'fvencimiento', 'fautorizacion', 'acuerdo'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $casts = [
        'fvencimiento' => 'datetime', 'fautorizacion' => 'datetime'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
