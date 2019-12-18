<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProducerInfo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

}
