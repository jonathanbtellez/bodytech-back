<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ProductRequest;
use App\Models\Api\v1\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'products' => Product::with('userCreator', 'user_last_update')->get()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    public function show(Product $product)
    {   
        return response()->json([
            'status' => true,
            'product' => $product->load('userCreator', 'user_last_update')
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'product' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([], 204);
    }
}
