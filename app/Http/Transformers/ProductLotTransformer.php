<?php

namespace App\Transformers;

use App\ProductLot;
use League\Fractal\TransformerAbstract;

class ProductLotTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductLot $productLot)
    {
        return [
            'product_lot_code' => (int)$productLot->productLotId,
            'product_code' => (int)$productLot->productPrice->product->productId,
            'product_name' => (string)$productLot->productPrice->product->productName,
            'product_image' => (string)$productLot->productPrice->product->productImage,
            'product_mass_measurement_code' => (int)$productLot->productPrice->productMassMeasurement->productMassMeasurementId,
            'product_mass_measurement_name' => (string)$productLot->productPrice->productMassMeasurement->productMassMeasurement,
            'product_quality_code' => (int)$productLot->productPrice->productQuality->productQualityId,
            'product_quality_name' => (string)$productLot->productPrice->productQuality->productQuality,
            'product_lot_price' => (float)$productLot->productLotSalePrice,
            'product_price_date_created' => (string)$productLot->created_at,
            'product_price_date_updated' => (string)$productLot->updated_at,
            'product_price_date_deleted' => isset($productLot->deleted_at)?(string)$productLot->deleted_at:null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'product_price_code' => 'productLotId',
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
            'product_price_status' => 'productLotStatus',
            'product_price_date_created' => 'created_at',
            'product_price_date_updated' => 'updated_at',
            'product_price_date_deleted' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'productLotId' => 'product_price_code',
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
            'productLotStatus' => 'product_price_status',
            'created_at' => 'product_price_date_created',
            'updated_at' => 'product_price_date_updated',
            'deleted_at' => 'product_price_date_deleted',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
