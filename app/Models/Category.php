<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description'
    ];


    public function news(): BelongsToMany
    {
        return $this->belongsToMany(
            News:: class,
            'category_has_news',
            'category_id',
            'news_id',
            'id',
            'id'
        );
    }

    public function paginate(int $quentity = 5): LengthAwarePaginator
    {
        return $this->news()->paginate($quentity);
    }

}
