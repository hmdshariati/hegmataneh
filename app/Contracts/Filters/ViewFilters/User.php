<?php

namespace App\Contracts\Filters\ViewFilters;

use App\Core\Abstracts\QueryFilter;
use App\Core\Interfaces\FilterInterface;

class User extends QueryFilter implements FilterInterface
{
    public function handle($value): void
    {
        $this->query->whereHas(
            "user",
            fn ($query) => $query->filterBy($value)
        );
    }
}
