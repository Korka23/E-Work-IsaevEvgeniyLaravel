<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(IndexProductRequest $request)
    {
        $validated = $request->validated();
        return ProductResource::collection($this->productService->listProducts($validated));
    }

    public function show(Product $product)
    {
        return ProductResource::make($product->load('category'));
    }

    public function store(StoreProductRequest $request)
    {
        return ProductResource::make($this->productService->store($request->validated()));
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        return ProductResource::make($this->productService->update($product, $request->validated()));
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return response()->noContent();
    }
}
