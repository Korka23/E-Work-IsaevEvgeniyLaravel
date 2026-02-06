<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return CategoryResource::collection(Category::query()->paginate(10));
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        return CategoryResource::make($this->categoryService->store($request->validated()));
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        return CategoryResource::make($this->categoryService->update($category, $request->validated()));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
