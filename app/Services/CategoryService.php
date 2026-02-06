<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function listCategories($per_page = 10): LengthAwarePaginator
    {
        return Category::query()->paginate($per_page);
    }
    public function delete(Category $category): void
    {
        $category->delete();
    }
}
