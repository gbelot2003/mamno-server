<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable
{
    use Notifiable, HasApiTokens, hasRoles, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status',
        'telefono', 'departamento_id', 'municipio_id', 'calle',
        'casa', 'lat', 'long',
        'identidad', 'rtn', 'rtn_image', 'grupo_id',
        'cuenta_image', 'descripcion_vehiculos', 'contrato', 'fvencimiento', 'fautorizacion',
        'acuerdo', 'nuevo', 'passwordAttempt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fvencimiento' => 'datetime',
        'fautorizacion' => 'datetime',
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
        'nuevo' => 'boolean',
        'passwordAttempt' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo(Municipios::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   /* public function info()
    {
        return $this->hasOne(AdicionalInfo::class, 'user_id', 'id');
    }*/

}
