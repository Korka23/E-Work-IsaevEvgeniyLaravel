<?php

namespace App\Enums;

enum ProductSortEnum: string
{
    case PRICE_DESC = 'price_desc';

    case PRICE_ASC = 'price_asc';

    case RATING_DESC = 'rating_desc';

    case NEWEST = 'newest';
}
