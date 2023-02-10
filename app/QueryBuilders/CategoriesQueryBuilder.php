<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class CategoriesQueryBuilder extends QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById(int $id): mixed
    {
        return $this->model->find($id, ['id', 'title']);

    }

}
