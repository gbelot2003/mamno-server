<?php

namespace App;

use App\DetailProductQuality;
use App\ProductClass;
use App\ProductPrice;
use App\ProductType;
use App\Transformers\ProductTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;
  public $transformer = ProductTransformer::class;

  protected $primaryKey='productId';
  protected $dates = ['deleted_at'];

  protected $fillable = [
  	'productName',
  	'productTypeId',
  	'productImage',
  	'productStatus',
  ];

  const PRODUCT_ACTIVE = 'true';
  const PRODUCT_INACTIVE = 'false';

  public function setProductNameAttribute($value){
    $this->attributes['productName'] = strtolower($value);
  }
  public function getProductNameAttribute($value){
    return ucwords($value);
  }

  public function isActive()
  {
  	return $this->productStatus == Product::PRODUCT_ACTIVE;
  }
  
  /* Product Type Relation */
  public function productType(){
  	return $this->belongsTo(ProductType::class, 'productTypeId');
  }

  /* Product Price Relation */
  public function productPrice(){
    return $this->hasMany(ProductPrice::class, 'productId');
  }
  
  /* Product Type Relation *//*
  public function productClass(){
    return $this->belongsToThrough(ProductClass::class, ProductType::class, 'productClassId', 'productClassId');
  }*/
}
