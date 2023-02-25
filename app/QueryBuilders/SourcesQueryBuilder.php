<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SourcesQueryBuilder extends QueryBuilder
{
    private Builder $model;

    function __construct()
    {
        $this->model = Source::query();
    }


    function getAll(): Collection
    {
        return $this->model->get();
    }
}
