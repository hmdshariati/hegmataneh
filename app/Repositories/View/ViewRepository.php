<?php

namespace App\Repositories\View;

use App\Models\View;
use App\Repositories\View\ViewRepositoryInterface;
use App\Core\Traits\ExteraQueriesTrait;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;

class ViewRepository extends BaseRepository implements ViewRepositoryInterface
{
    use ExteraQueriesTrait ;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return View::class;
    }

}
