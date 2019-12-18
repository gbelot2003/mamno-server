<?php

namespace App;

use App\ProductType;
use App\Transformers\ProductClassTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductClass extends Model
{
  use SoftDeletes;
  public $transformer = ProductClassTransformer::class;
  
  protected $primaryKey='productClassId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'productClass',
    'productClassImage',
    'productClassStatus'
  ];

  const PRODUCT_CLASS_ACTIVE = 'true';
  const PRODUCT_CLASS_INACTIVE = 'false';

  public function isActive(){
  	return $this->productClassStatus == ProductClass::PRODUCT_CLASS_ACTIVE;
  }
  
  /* Product Type Relation */
  public function productType(){
    return $this->hasMany(ProductType::class, 'productClassId');
  }
}
