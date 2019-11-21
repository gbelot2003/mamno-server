<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class, 'grupo_id', 'id');
    }
}
