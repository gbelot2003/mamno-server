<?php

namespace App\Transformers;

use App\ProductClass;
use League\Fractal\TransformerAbstract;

class ProductClassTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductClass $productClass)
    {
        return [
            'product_class_code' => (int)$productClass->productClassId,
            'product_class' => (string)$productClass->productClass,
            'product_class_image' => (string)$productClass->productClassImage,
            'product_class_status' => (string)$productClass->productClassStatus,
            'product_class_date_created' => (string)$productClass->cretaed_at,
            'product_class_date_updated' => (string)$productClass->updated_at,
            'product_class_date_deleted' => isset($productClass->deleted_at)?(string)$productClass->deleted_at:null,
        ];
    }
}
