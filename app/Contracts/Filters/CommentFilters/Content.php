<?php

namespace App\Contracts\Filters\CommentFilters;

use App\Core\Abstracts\QueryFilter;
use App\Core\Interfaces\FilterInterface;

class Content extends QueryFilter implements FilterInterface
{
    public function handle($value): void
    {
        $this->query->where('content', "like" , "%{$value}%");
    }
}
