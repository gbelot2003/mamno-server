<?php

namespace App;

use App\Product;
use App\ProductMassMeasurement;
use App\ProductQuality;
use App\Transformers\ProductPriceTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPrice extends Model
{
  use SoftDeletes;
  public $transformer = ProductPriceTransformer::class;
  
  protected $primaryKey='productPriceId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productId',
    'productMassMeasurementId',
    'productQualityId',
    'productLowPrice',
    'productAvgPrice',
    'productHighPrice',
    'productPriceStatus'
  ];

  const PRODUCT_PRICE_ACTIVE = 'true';
  const PRODUCT_PRICE_INACTIVE = 'false';

  public function isActive(){
  	return $this->productPriceStatus == ProductPrice::PRODUCT_PRICE_ACTIVE;
  }
  
  /* Product Relation */
  public function product(){
    return $this->belongsTo(Product::class, 'productId');
  }
  
  /* Product Relation */
  public function productMassMeasurement(){
    return $this->belongsTo(ProductMassMeasurement::class, 'productMassMeasurementId');
  }
  
  /* Product Relation */
  public function productQuality(){
    return $this->belongsTo(ProductQuality::class, 'productQualityId');
  }
}
