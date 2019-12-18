<?php

namespace App\Http\Controllers\ProductQualities;

use App\ProductQuality;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductQualitiesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productQualities = ProductQuality::where('productQualityStatus', 'true')->get();
        return $this->showCollection($productQualities,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productQualityId
     * @return \Illuminate\Http\Response
     */
    public function show(ProductQuality $productQuality)
    {
        return $this->showRecord($productQuality,200);
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
            'productQuality' => 'required',
        ];
        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['productQualityStatus'] = ProductQuality::PRODUCT_QUALITY_ACTIVE;

        $productQuality = ProductQuality::create($fields);

        return $this->showRecord($productQuality,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productQualityId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductQuality $productQuality)
    {
        $rules = [
            'productQualityStatus' => 'in:'.ProductQuality::PRODUCT_QUALITY_ACTIVE.','.ProductQuality::PRODUCT_QUALITY_INACTIVE
        ];
        $this->validate($request, $rules);

        if($request->has('productQuality')){
            $productQuality->productQuality = $request->productQuality;
        }

        /**/
        if($request->has('productQualityStatus')){
            $productQuality->productQualityStatus = $request->productQualityStatus;
        }

        if (!$productQuality->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $productQuality->save();

        return $this->showMessage('Calidad de producto fue actualizada exitosamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productQualityId
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductQuality $productQuality)
    {
        $productQuality->productQualityStatus = ProductQuality::PRODUCT_QUALITY_INACTIVE;
        $productQuality->save();
        $productQuality->delete();
        $productQuality->delete();

        return $this->showMessage('Calidad de producto fue eliminada.');
    }
}
