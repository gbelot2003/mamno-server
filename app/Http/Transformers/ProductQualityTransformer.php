<?php

namespace App\Transformers;

use App\ProductQuality;
use League\Fractal\TransformerAbstract;

class ProductQualityTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductQuality $productQuality)
    {
        return [
            'product_quality_code' => (int)$productQuality->productQualityId,
            'product_quality_name' => (string)$productQuality->productQuality,
            'product_quality_status' => (string)$productQuality->productQualityStatus,
            'product_quality_date_created' => (string)$productQuality->created_at,
            'product_quality_date_updated' => (string)$productQuality->updated_at,
            'product_quality_date_deleted' => isset($productQuality->deleted_at)?(string)$productQuality->deleted_at:null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'product_quality_code' => 'productQualityId',
            'product_quality_name' => 'productQuality',
            'product_quality_status' => 'productQualityStatus',
            'product_quality_date_created' => 'created_at',
            'product_quality_date_updated' => 'updated_at',
            'product_quality_date_deleted' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'productQualityId' => 'product_quality_code',
            'productQuality' => 'product_quality_name',
            'productQualityStatus' => 'product_quality_status',
            'created_at' => 'product_quality_date_created',
            'updated_at' => 'product_quality_date_updated',
            'deleted_at' => 'product_quality_date_deleted',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
