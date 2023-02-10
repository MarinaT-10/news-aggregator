<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    private Builder $model;

    function __construct()
    {
        $this->model = News::query();
    }

    public function getNewsByStatus(string $status): Collection
    {
        return News::query()->where('status', $status)->get();
    }

    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getNewsById(int $id): mixed
    {
        return $this->model->find($id, ['id', 'title', 'author', 'status', 'description', 'created_at']);
    }


}
