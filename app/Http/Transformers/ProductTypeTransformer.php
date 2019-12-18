<?php

namespace App\Transformers;

use App\ProductType;
use League\Fractal\TransformerAbstract;

class ProductTypeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductType $productType)
    {
        return [
            'product_type_code' => (int)$productType->productTypeId,
            'product_type_name' => (string)$productType->productType,
            'product_type_image' => (string)$productType->productTypeImage,
            'product_class_code' => (string)$productType->productClass->productClassId,
            'product_class_name' => (string)$productType->productClass->productClass,
            'product_type_status' => (string)$productType->productTypeStatus,
            'product_type_date_created' => (string)$productType->created_at,
            'product_type_date_updated' => (string)$productType->updated_at,
            'product_type_date_deleted' => isset($productType->deleted_at)?(string)$productType->deleted_at:null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'product_type_code' => 'productTypeId',
            'product_type_name' => 'productType',
            'product_type_image' => 'productTypeImage',
            'product_class_code' => 'productClass->productClassId',
            'product_class_name' => 'productClass->productClass',
            'product_type_status' => 'productTypeStatus',
            'product_type_date_created' => 'created_at',
            'product_type_date_updated' => 'updated_at',
            'product_type_date_deleted' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'productTypeId' => 'product_type_code',
            'productType' => 'product_type_name',
            'productTypeImage' => 'product_type_image',
            'productClass->productClassId' => 'product_class_code',
            'productClass->productClass' => 'product_class_name',
            'productTypeStatus' => 'product_type_status',
            'created_at' => 'product_type_date_created',
            'updated_at' => 'product_type_date_updated',
            'deleted_at' => 'product_type_date_deleted',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
