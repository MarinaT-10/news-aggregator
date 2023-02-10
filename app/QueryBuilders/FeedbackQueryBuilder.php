<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Feedback;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class FeedbackQueryBuilder extends QueryBuilder
{
    private Builder $model;

    function __construct()
    {
        $this->model = Feedback::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getFeedbackWithPagination(int $quantity = 4): LengthAwarePaginator
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate($quantity);
    }

    public function getFeedbackById(int $id): mixed
    {
        return $this->model->find($id, ['id', 'author', 'email','message', 'status', 'created_at']);
    }


}
