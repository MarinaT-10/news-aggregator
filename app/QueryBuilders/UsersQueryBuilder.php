<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersQueryBuilder extends QueryBuilder
{
    private Builder $model;

    function __construct()
    {
        $this->model = User::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getUserById(int $id): mixed
    {
        return $this->model->find($id, ['id', 'is_admin', 'name', 'email', 'created_at', 'updated_at']);
    }
}
