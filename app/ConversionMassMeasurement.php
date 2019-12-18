<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ConversionMassMeasurement extends Model implements Auditable
{
  use SoftDeletes, \OwenIt\Auditing\Auditable;
  
  protected $primaryKey='conversionId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productMassMeasurementId1',
    'productMassMeasurementId2',
    'conversionValue',
    'conversionStatus'
  ];

  const CONVERSION_ACTIVE = 'true';
  const CONVERSION_INACTIVE = 'false';

  public function isActive(){
  	return $this->conversionStatus == ConversionMassMeasurement::CONVERSION_ACTIVE;
  }
}
