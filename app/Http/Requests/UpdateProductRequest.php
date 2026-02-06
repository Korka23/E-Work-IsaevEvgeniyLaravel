<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'in_stock' => 'sometimes|boolean',
            'rating' => 'sometimes|numeric|max:5|min:0',
            'category_id' => 'sometimes|nullable',
        ];
    }
}
