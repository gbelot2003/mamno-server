<?php

namespace App\Transformers;

use App\ProductPrice;
use League\Fractal\TransformerAbstract;

class ProductPriceTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductPrice $productPrice)
    {
        return [
            'product_price_code' => (int)$productPrice->productPriceId,
            'product_code' => (int)$productPrice->productId,
            'product_name' => (string)$productPrice->product->productName,
            'product_image' => (string)$productPrice->product->productImage,
            'product_mass_measurement_code' => (int)$productPrice->productMassMeasurementId,
            'product_mass_measurement_name' => (string)$productPrice->productMassMeasurement->productMassMeasurement,
            'product_quality_code' => (int)$productPrice->productQualityId,
            'product_quality_name' => (string)$productPrice->productQuality->productQuality,
            'product_price_low' => (float)$productPrice->productLowPrice,
            'product_price_avg' => (float)$productPrice->productAvgPrice,
            'product_price_high' => (float)$productPrice->productHighPrice,
            'product_price_date_created' => (string)$productPrice->created_at,
            'product_price_date_updated' => (string)$productPrice->updated_at,
            'product_price_date_deleted' => isset($productPrice->deleted_at)?(string)$productPrice->deleted_at:null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'product_price_code' => 'productPriceId',
            'product_code' => 'productId',
            'product_name' => 'product->productName',
            'product_image' => 'product->productImage',
            'product_mass_measurement_code' => 'productMassMeasurementId',
            'product_mass_measurement_name' => 'productMassMeasurement->productMassMeasurement',
            'product_quality_code' => 'productQualityId',
            'product_quality_name' => 'productQuality->productQuality',
            'product_price_low' => 'productLowPrice',
            'product_price_avg' => 'productAvgPrice',
            'product_price_high' => 'productHighPrice',
            'product_price_status' => 'productPriceStatus',
            'product_price_date_created' => 'created_at',
            'product_price_date_updated' => 'updated_at',
            'product_price_date_deleted' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'productPriceId' => 'product_price_code',
            'productId' => 'product_code',
            'product->productName' => 'product_name',
            'product->productImage' => 'product_image',
            'productMassMeasurementId' => 'product_mass_measurement_code',
            'productMassMeasurement->productMassMeasurement' => 'product_mass_measurement_name',
            'productQualityId' => 'product_quality_code',
            'productQuality->productQuality' => 'product_quality_name',
            'productLowPrice' => 'product_price_low',
            'productAvgPrice' => 'product_price_avg',
            'productHighPrice' => 'product_price_high',
            'productPriceStatus' => 'product_price_status',
            'created_at' => 'product_price_date_created',
            'updated_at' => 'product_price_date_updated',
            'deleted_at' => 'product_price_date_deleted',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
