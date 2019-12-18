<?php

namespace App;

use App\ProductPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductMassMeasurement extends Model implements Auditable
{
  use SoftDeletes, \OwenIt\Auditing\Auditable;
  
  protected $primaryKey='productMassMeasurementId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productMassMeasurement',
    'productMassMeasurementStatus'
  ];

  const PRODUCT_MASS_ACTIVE = 'true';
  const PRODUCT_MASS_INACTIVE = 'false';

  public function isActive(){
  	return $this->productMassMeasurementStatus == ProductMassMeasurement::PRODUCT_MASS_ACTIVE;
  }

  /* Product Price Relation */
  public function productPrice(){
    return $this->hasMany(ProductPrice::class, 'productMassMeasurementId');
  }
}
