<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public $relations = [];

    public function q($value): ProductFilter
    {
        return $this->whereFullText('name', $value);
    }

    public function price_from($value): ProductFilter
    {
        return $this->where('price', '>=', $value);
    }

    public function price_to($value): ProductFilter
    {
        return $this->where('price', '<=', $value);
    }

    public function category($value): ProductFilter
    {
        return $this->where('category_id', $value);
    }

    public function rating_from($value): ProductFilter
    {
        return $this->where('rating', '>=', $value);
    }
}
