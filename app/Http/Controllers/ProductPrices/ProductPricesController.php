<?php

namespace App\Http\Controllers\ProductPrices;

use App\ProductPrice;
use App\Product;
use App\ProductMassMeasurement;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Transformers\ProductPriceTransformer;

class ProductPricesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productPrices = ProductPrice::with('ProductMassMeasurement', 'Product', 'ProductQuality')->get();
        return $this->showCollection($productPrices,200);
        //return $productPrices;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productPriceId
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPrice $productPrice)
    {
        return $this->showRecord($productPrice,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_code' => 'required',
            'product_mass_measurement_code' => 'required',
            'product_quality_code' => 'required',
            'product_price_low' => 'required',
            'product_price_avg' => 'required',
            'product_price_high' => 'required',
        ];
        $this->validate($request, $rules);
        $transformer = ProductPriceTransformer::class;
        foreach (request()->request as $field => $value) {
            $attribute = $transformer::originalAttribute($field);
            if (isset($field)) {
                $request[$attribute] = $request[$field];
                unset($request[$field]);
            }
        }
        $fields = $request->all();
        $fields['productPriceStatus'] = ProductPrice::PRODUCT_PRICE_ACTIVE;

        $productPrice = ProductPrice::create($fields);

        return $this->showRecord($productPrice,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productPriceId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPrice $productPrice)
    {
        $rules = [
            'product_price_status' => 'in:'.ProductPrice::PRODUCT_PRICE_ACTIVE.','.ProductPrice::PRODUCT_PRICE_INACTIVE
        ];
        $this->validate($request, $rules);

        $transformer = ProductPriceTransformer::class;
        foreach (request()->request as $field => $value) {
            $attribute = $transformer::originalAttribute($field);
            if (isset($field)) {
                $request[$attribute] = $request[$field];
                unset($request[$field]);
            }
        }

        if($request->has('productId')){
            $productPrice->productId = $request->productId;
        }

        if($request->has('productQualityId')){
            $productPrice->productQualityId = $request->productQualityId;
        }

        if($request->has('productMassMeasurementId')){
            $productPrice->productMassMeasurementId = $request->productMassMeasurementId;
        }

        if($request->has('productLowPrice')){
            $productPrice->productLowPrice = $request->productLowPrice;
        }

        if($request->has('productAvgPrice')){
            $productPrice->productAvgPrice = $request->productAvgPrice;
        }

        if($request->has('productHighPrice')){
            $productPrice->productHighPrice = $request->productHighPrice;
        }

        if($request->has('productPriceStatus')){
            $productPrice->productPriceStatus = $request->productPriceStatus;
        }

        if (!$productPrice->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $productPrice->save();

        return $this->showMessage('Precio de producto fue actualizado exitosamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productPriceId
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPrice $productPrice)
    {
        $productPrice->productPriceStatus = ProductPrice::PRODUCT_PRICE_INACTIVE;
        $productPrice->save();
        $productPrice->delete();

        return $this->showMessage('Precio de producto fue eliminada.');
    }
}
