<?php

namespace App\Contracts\Filters\SkillFilters;

use App\Core\Abstracts\QueryFilter;
use App\Core\Interfaces\FilterContract;

class User extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->whereHas("users", fn ($query) => $query->where("users.id", $value));
    }
}