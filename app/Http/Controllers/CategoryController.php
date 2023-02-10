<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {

    }

    public function show(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        int $id
    ): View {
        $categoriesList = $categoriesQueryBuilder->getAll();
        $categoryOne = $categoriesQueryBuilder->getCategoryById($id);
        $categoryNews = $categoryOne->paginate(2);

        return \view('categories.show', [
            'categoryOne' => $categoryOne,
            'categoriesList' => $categoriesList,
            'categoryNews' => $categoryNews,
        ]);
    }

}
