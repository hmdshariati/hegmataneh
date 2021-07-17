<?php

namespace App\Contracts\Filters\CommentFilters;

use App\Core\Abstracts\QueryFilter;
use App\Core\Interfaces\FilterContract;

class CommentId extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->where('comment_id', $value);
    }
}