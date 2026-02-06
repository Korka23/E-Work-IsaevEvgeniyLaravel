<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'in_stock' => 'required|boolean',
            'rating' => 'required|numeric|max:5|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
