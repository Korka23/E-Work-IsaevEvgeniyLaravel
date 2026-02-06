<?php

namespace App\Models;

use App\Enums\ProductSortEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use Filterable;
    protected $guarded = [];

    protected $casts = [
        'in_stock' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSort(Builder $query, ?string $sort = null): void
    {
        match ($sort) {
            ProductSortEnum::NEWEST->value => $query->orderByDesc('created_at'),
            ProductSortEnum::PRICE_ASC->value => $query->orderBy('price'),
            ProductSortEnum::PRICE_DESC->value => $query->orderByDesc('price'),
            ProductSortEnum::RATING_DESC->value => $query->orderBy('rating'),
            default => $query->orderByDesc('id'),
        };
    }
}
