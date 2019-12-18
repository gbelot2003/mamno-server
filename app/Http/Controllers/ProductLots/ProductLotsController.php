<?php

namespace App\Http\Controllers\ProductLots;

use App\Http\Controllers\ApiController;
use App\ProductLot;
use App\ProductPrice;
use Illuminate\Http\Request;

class ProductLotsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productLots = ProductLot::with('ProductPrice')->get();
        return $this->showCollection($productLots,200);
        return $productLots;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productLotId
     * @return \Illuminate\Http\Response
     */
    public function show(ProductLot $productLot)
    {
        return $this->showRecord($productLot,200);
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
            'productLotQuantity' => 'required',
            'productLotAvailableDate' => 'required',
            'productLotPickupAddress' => 'required',
        ];
        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['productLotStatus'] = ProductLot::PRODUCT_LOT_ACTIVE;

        $productLot = ProductLot::create($fields);

        return $this->showRecord($productLot,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productLotId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductLot $productLot)
    {
        $rules = [
            'productLotStatus' => 'in:'.ProductLot::PRODUCT_LOT_ACTIVE.','.ProductLot::PRODUCT_LOT_INACTIVE
        ];
        $this->validate($request, $rules);

        if($request->has('productPriceId')){
            $productLot->productPriceId = $request->productPriceId;
        }

        if($request->has('productLotQuantity')){
            $productLot->productLotQuantity = $request->productLotQuantity;
        }

        if($request->has('productLotStatus')){
            $productLot->productLotStatus = $request->productLotStatus;
        }

        if (!$productLot->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $productLot->save();

        return $this->showMessage('Lote de producto fue actualizado exitosamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productLotId
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLot $productLot)
    {
        $productLot->productLotStatus = ProductLot::PRODUCT_LOT_INACTIVE;
        $productLot->save();
        $productLot->delete();

        return $this->showMessage('Lote de producto de producto fue eliminada.');
    }
}
