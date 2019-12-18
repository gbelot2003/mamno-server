<?php

namespace App;

use App\Product;
use App\ProductMassMeasurement;
use App\ProductPrice;
use App\ProductQuality;
use App\Transformers\ProductLotTransformer;
use App\Transformers\ProductPriceTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLot extends Model
{
  use SoftDeletes;
  public $transformer = ProductLotTransformer::class;
  
  protected $primaryKey='productLotId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productPriceId',
    'productLotQuantity',
    'productLotcultivatedArea',
    'productLotcultivatedAreaAddress',
    'productLotcultivatedAreaPerformance',
    'productLotProductionMode',
    'productLotSalePrice',
    'productLotSaleType',
    'productLotAvailableDate',
    'productLotExpirationDate',
    'productLotPickupAddress',
    'productLotStatus',
  ];

  const PRODUCT_LOT_ACTIVE = 'true';
  const PRODUCT_LOT_INACTIVE = 'false';

  public function isActive(){
  	return $this->productLotStatus == ProductLot::PRODUCT_LOT_ACTIVE;
  }
  
  /* Product Relation */
  public function productPrice(){
    return $this->belongsTo(ProductPrice::class, 'productPriceId');
  }
}
