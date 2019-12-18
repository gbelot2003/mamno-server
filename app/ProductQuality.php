<?php

namespace App;

use App\ProductPrice;
use App\Transformers\ProductQualityTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductQuality extends Model implements Auditable
{
  use SoftDeletes, \OwenIt\Auditing\Auditable;

  public $transformer = ProductQualityTransformer::class;
  
  protected $primaryKey='productQualityId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productQuality',
    'productQualityStatus'
  ];

  const PRODUCT_QUALITY_ACTIVE = 'true';
  const PRODUCT_QUALITY_INACTIVE = 'false';

  public function isActive(){
  	return $this->productQualityStatus == ProductQuality::PRODUCT_QUALITY_ACTIVE;
  }

  /* Product Price Relation */
  public function productPrice(){
    return $this->hasMany(ProductPrice::class, 'productQualityId');
  }
}
