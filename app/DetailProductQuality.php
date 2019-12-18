<?php

namespace App;

use App\ProductPrice;
use App\ProductQuality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailProductQuality extends Model
{
  use SoftDeletes;
  
  protected $primaryKey='detailproductQualityId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productPriceId',
    'productQualityId',
    'detailproductQualityStatus'
  ];

  const DETAIL_PRODUCT_QUALITY_ACTIVE = 'true';
  const DETAIL_PRODUCT_QUALITY_INACTIVE = 'false';

  public function isActive(){
  	return $this->DetailproductQualityStatus == DetailProductQuality::DETAIL_PRODUCT_QUALITY_ACTIVE;
  }
  
  /* Product Price Relation */
  public function productPrice(){
    return $this->belongsTo(ProductPrice::class, 'productPriceId');
  }
  
  /* Product Quality Relation */
  public function productQuality(){
    return $this->belongsTo(ProductQuality::class, 'productQualityId');
  }
}
