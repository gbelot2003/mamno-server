<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConversionMassMeasurement extends Model
{
  use SoftDeletes;
  
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
