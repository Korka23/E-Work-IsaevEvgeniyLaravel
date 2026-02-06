<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function store($data): Category
    {
        return Category::query()->create($data);
    }

    public function update(Category $category, $data): Category
    {
        $category->update($data);
        return $category;
    }
}
