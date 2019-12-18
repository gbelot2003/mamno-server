<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Support extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'support_id';

    public function supportType() {
        return $this->belongsTo('App\SupportType');
    }
}
