<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $primaryKey = 'support_id';

    public function supportType() {
        return $this->belongsTo('App\SupportType');
    }
}
