<?php

namespace App\Contracts\Filters\PostFilters;

use App\Core\Abstracts\QueryFilter;
use App\Core\Interfaces\FilterInterface;

class Development extends QueryFilter implements FilterInterface
{
    public function handle($value): void
    {
        $this->query->where("development", $value);
    }

    public function rangeHandle($values): void
    {
        foreach ($values as $value) {
            $this->query->where('development', ...$value);
        }
    }
}
