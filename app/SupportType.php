<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SupportType extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'support_type_id';

    public function supports() {
        return $this->hasMany('App\Support');
    }
}
