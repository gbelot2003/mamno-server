<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\ApiController;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductTypesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::with('productClass')->get();
        return $this->showCollection($productTypes,200);
        //return $productTypes;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productTypeId
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        return $this->showRecord($productType,200);
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
            'productType' => 'required',
            'productTypeImage' => 'required',
            'productClassId' => 'required',
            'productTypeStatus' => 'required',
        ];
        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['productTypeStatus'] = ProductType::PRODUCT_TYPE_ACTIVE;
        $fields['productTypeImage'] = $request->productTypeImage->store('');

        $productType = ProductType::create($fields);

        return $this->showRecord($productType,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productTypeId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $rules = [
            'productTypeStatus' => 'in:'.ProductType::PRODUCT_TYPE_ACTIVE.','.ProductType::PRODUCT_TYPE_INACTIVE
        ];
        $this->validate($request, $rules);

        if($request->has('productType')){
            $productType->productType = $request->productType;
        }

        if($request->has('productClassId')){
            $productType->productClassId = $request->productClassId;
        }

        if($request->hasFile('image')){
            Storage::delete($productType->productTypeImage);
            $productType->productTypeImage = $request->productTypeImage->store('');
        }
        /**/
        if($request->has('productTypeStatus')){
            $productType->productTypeStatus = $request->productTypeStatus;
        }

        if (!$productType->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $productType->save();

        return $this->showMessage('Tipo de producto fue actualizado satisfactoriamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productTypeId
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->productTypeStatus = ProductType::PRODUCT_TYPE_INACTIVE;
        Storage::delete($productType->productTypeImage);
        $productType->save();
        $productType->delete();

        return $this->showMessage('Tipo de producto fue eliminado.');
    }
}
