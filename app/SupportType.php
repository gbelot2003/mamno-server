<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
    protected $primaryKey = 'support_type_id';

    public function supports() {
        return $this->hasMany('App\Support');
    }
}
