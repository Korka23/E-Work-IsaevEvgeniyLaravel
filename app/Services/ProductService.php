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
}
