<?php

namespace App;

use App\Product;
use App\ProductClass;
use App\Transformers\ProductTypeTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ProductType extends Model implements Auditable
{
  use SoftDeletes, \OwenIt\Auditing\Auditable;
  
  public $transformer = ProductTypeTransformer::class;

  protected $primaryKey='productTypeId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productType',
    'productTypeImage',
    'productTypeStatus',
    'productClassId'
  ];

  const PRODUCT_TYPE_ACTIVE = 'true';
  const PRODUCT_TYPE_INACTIVE = 'false';

  public function isActive(){
  	return $this->productTypeStatus == ProductType::PRODUCT_TYPE_ACTIVE;
  }
  
  /* Product Relation */
  public function product(){
  	return $this->hasMany(Product::class, 'productTypeId');
  }
  /* Product Class Relation */
  public function productClass(){
    return $this->belongsTo(ProductClass::class, 'productClassId');
  }
}
