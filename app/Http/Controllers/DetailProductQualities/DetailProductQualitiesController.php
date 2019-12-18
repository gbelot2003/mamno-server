<?php

namespace App\Http\Controllers\DetailProductQualities;

use App\Http\Controllers\Controller;
use App\ProductPrice;
use App\ProductQuality;
use Illuminate\Http\Request;

class DetailProductQualitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailProductQuality = DetailProductQuality::with('ProductPrice', 'ProductQuality')->get();
        //return $this->showCollection($detailProductQuality,200);
        return $detailProductQuality;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $detailProductQualityId
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProductQuality $detailProductQuality)
    {
        return $this->showRecord($detailProductQuality,200);
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
            'productPriceId' => 'required',
            'productQualityId' => 'required',
        ];
        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['DetailproductQualityStatus'] = DetailProductQuality::DETAIL_PRODUCT_QUALITY_ACTIVE;

        $detailProductQuality = DetailProductQuality::create($fields);

        return $this->showRecord($detailProductQuality,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $detailProductQualityId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProductQuality $detailProductQuality)
    {
        $rules = [
            'DetailproductQualityStatus' => 'in:'.DetailProductQuality::DETAIL_PRODUCT_QUALITY_ACTIVE.','.DetailProductQuality::DETAIL_PRODUCT_QUALITY_INACTIVE
        ];
        $this->validate($request, $rules);

        if($request->has('productPriceId')){
            $detailProductQuality->productPriceId = $request->productPriceId;
        }

        if($request->has('productQualityId')){
            $detailProductQuality->productQualityId = $request->productQualityId;
        }

        if($request->has('DetailproductQualityStatus')){
            $detailProductQuality->DetailproductQualityStatus = $request->DetailproductQualityStatus;
        }

        if (!$detailProductQuality->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $detailProductQuality->save();

        return $this->showMessage('Producto fue actualizado exitosamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $detailProductQualityId
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProductQuality $detailProductQuality)
    {
        $detailProductQuality->DetailproductQualityStatus = DetailProductQuality::DETAIL_PRODUCT_QUALITY_INACTIVE;
        $detailProductQuality->save();
        $detailProductQuality->delete();

        return $this->showMessage('Producto fue eliminado.');
    }
}
