<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;

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

    public function showOneCategory(int $id)
    {
        return \view('news.categoryOne', [
            'categories' => $this->getCategory($id),
            'news' => $this->getNews(),
        ]);
    }
}
