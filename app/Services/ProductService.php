<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function store($data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function listProducts($data): Product
    {
        return Product::query()->filter($data)->sort($data['sort'] ?? null)->with('category')->paginate($data['sort'] ?? 10);
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
