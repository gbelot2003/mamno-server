<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\ApiController;
use App\Product;
use App\ProductClass;
use App\ProductType;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productType')->get();
        return $this->showCollection($products,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->showRecord($product,200);
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
            'product_name' => 'required',
            'product_type_code' => 'required',
            'product_image' => 'required',
        ];
        $this->validate($request, $rules);

        $transformer = ProductTransformer::class;
        foreach (request()->request as $field => $value) {
            $attribute = $transformer::originalAttribute($field);
            if (isset($field)) {
                $request[$attribute] = $request[$field];
                unset($request[$field]);
            }
        }

        $fields = $request->all();

        $fields['productStatus'] = Product::PRODUCT_ACTIVE;
        $fields['productImage'] = $request->productImage->store('');

        $product = Product::create($fields);

        return $this->showRecord($product,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'product_status' => 'in:'.Product::PRODUCT_ACTIVE.','.Product::PRODUCT_INACTIVE
        ];
        $this->validate($request, $rules);

        $transformer = ProductTransformer::class;
        foreach (request()->request as $field => $value) {
            $attribute = $transformer::originalAttribute($field);
            if (isset($field)) {
                $request[$attribute] = $request[$field];
                unset($request[$field]);
            }
        }

        if($request->has('productName')){
            $product->productName = $request->productName;
        }

        if($request->has('productTypeId')){
            $product->productTypeId = $request->productTypeId;
        }

        if($request->hasFile('image')){
            Storage::delete($product->productImage);
            $product->productImage = $request->productImage->store('');
        }
        /**/
        if($request->has('productStatus')){
            $product->productStatus = $request->productStatus;
        }

        if (!$product->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $product->save();

        return $this->showMessage('Producto fue actualizado exitosamente.', 201);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->productStatus = Product::PRODUCT_INACTIVE;
        Storage::delete($product->productImage);
        $product->save();
        $product->delete();

        return $this->showMessage('Producto fue eliminado.');
    }
}
