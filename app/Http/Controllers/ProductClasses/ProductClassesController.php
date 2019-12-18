<?php

namespace App\Http\Controllers\ProductClasses;

use App\Http\Controllers\ApiController;
use App\ProductClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductClassesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productClasses = ProductClass::where('productClassStatus', 'true')->get();
        return $this->showCollection($productClasses,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productClassId
     * @return \Illuminate\Http\Response
     */
    public function show(ProductClass $productClass)
    {
        return $this->showRecord($productClass,200);
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
            'productClass' => 'required',
            'productClassImage' => 'required',
        ];
        $this->validate($request, $rules);

        $fields = $request->all();
        $fields['productClassStatus'] = ProductClass::PRODUCT_CLASS_ACTIVE;
        $fields['productClassImage'] = $request->productClassImage->store('');

        $productClass = ProductClass::create($fields);

        return $this->showRecord($productClass,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productClassId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClass $productClass)
    {
        $rules = [
            'productClassStatus' => 'in:'.ProductClass::PRODUCT_CLASS_ACTIVE.','.ProductClass::PRODUCT_CLASS_INACTIVE
        ];
        $this->validate($request, $rules);

        if($request->has('productClass')){
            $productClass->productClass = $request->productClass;
        }

        if($request->hasFile('image')){
            Storage::delete($productClass->productClassImage);
            $productClass->productClassImage = $request->productClassImage->store('');
        }

        if($request->has('productClassStatus')){
            $productClass->productClassStatus = $request->productClassStatus;
        }

        if (!$productClass->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $productClass->save();

        return $this->showMessage('Clase de producto fue actualizada exitosamente.', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productClassId
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClass $productClass)
    {
        $productClass->productClassStatus = ProductClass::PRODUCT_CLASS_INACTIVE;
        Storage::delete($productClass->productClassImage);
        $productClass->save();
        $productClass->delete();

        return $this->showMessage('Clase de producto fue eliminada.');
    }
}
