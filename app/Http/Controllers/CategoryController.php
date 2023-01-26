<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\NewsController;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use CategoriesTrait;
    use NewsTrait;
    public function showAllCategory()
    {
        return \view('news.category', [
            'categories' => $this->getCategory(),
        ]);
    }

    public function showOneCategory(int $id): View
    {
        return \view('news.categoryOne', [
            'categories' => $this->getCategory($id),
            'news' => $this->getNews(),
        ]);
    }
}
