<?php

namespace App\Repositories\Option;

use App\Models\Option;
use NamTran\LaravelMakeRepositoryService\Repository\BaseRepository;
use App\Repositories\Option\OptionRepositoryInterface;

class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Option::class;
    }

    public function updateOrCreate($key, $value)
    {
        return $this->model->updateOrCreate(
            ["key" => $key],
            ["value" => $value]
        );
    }
}
