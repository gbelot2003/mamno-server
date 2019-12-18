<?php

namespace App\Transformers;

use App\Product;
use App\ProductType;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'product_code' => (int)$product->productId,
            'product_name' => (string)$product->productName,
            'product_type_code' => (int)$product->productTypeId,
            'product_type_name' => (string)$product->productType->productType,
            'product_class_code' => (string)$product->productType->productClassId,
            'product_class_name' => (string)$product->productType->productClass->productClass,
            'product_image' => (string)$product->productImage,
            'product_status' => (string)$product->productStatus,
            'product_date_created' => (string)$product->created_at,
            'product_date_updated' => (string)$product->updated_at,
            'product_date_deleted' => isset($product->deleted_at)?(string)$product->deleted_at:null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'product_code' => 'productId',
            'product_name' => 'productName',
            'product_type_code' => 'productTypeId',
            'product_type_name' => 'productType',
            'product_class_code' => 'productClassId',
            'product_class_name' => 'productType->productClass->productClass',
            'product_image' => 'productImage',
            'product_status' => 'productStatus',
            'product_date_created' => 'created_at',
            'product_date_updated' => 'updated_at',
            'product_date_deleted' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'productId' => 'product_code',
            'productName' => 'product_name',
            'productTypeId' => 'product_type_code',
            'productType' => 'product_type_name',
            'productClassId' => 'product_class_code',
            'productType->productClass->productClass' => 'product_class_name',
            'productImage' => 'product_image',
            'productStatus' => 'product_status',
            'created_at' => 'product_date_created',
            'updated_at' => 'product_date_updated',
            'deleted_at' => 'product_date_deleted',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
