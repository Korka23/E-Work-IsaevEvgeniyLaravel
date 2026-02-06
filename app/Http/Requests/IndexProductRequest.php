<?php

namespace App\Http\Requests;

use App\Enums\ProductSortEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'q' => 'sometimes|string',
            'price_from' => 'sometimes|numeric',
            'price_to' => 'sometimes|numeric',
            'category_id' => 'sometimes|integer',
            'rating_from' => 'sometimes|integer',
            'sort' => [new Enum(ProductSortEnum::class), 'nullable'],
        ];
    }
}
