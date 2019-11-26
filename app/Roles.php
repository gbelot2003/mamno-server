<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Role;

class Roles extends Role implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}
