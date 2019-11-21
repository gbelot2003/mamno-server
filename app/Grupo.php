<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'grupo_id', 'id');
    }
}
