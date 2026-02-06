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
        return ProductResource::collection(Product::query()->filter($validated)->sort($validated['sort'] ?? null)->paginate($request->per_page ?? 10));
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
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
        $product->delete();
        return response()->noContent();
    }
}
