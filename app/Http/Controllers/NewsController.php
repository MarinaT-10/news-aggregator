<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;



class NewsController extends Controller
{

    public function index(
        NewsQueryBuilder $newsQueryBuilder,
        CategoriesQueryBuilder $categoriesQueryBuilder
    ): View {
        $newsList = $newsQueryBuilder->getNewsWithPagination();
        $categoriesList = $categoriesQueryBuilder->getAll();

        return \view('news.index', [
            'categoriesList' => $categoriesList,
            'newsList' => $newsList,
        ]);
    }

    public function show(
        NewsQueryBuilder $newsQueryBuilder,
        CategoriesQueryBuilder $categoriesQueryBuilder,
        int $id
    ): View {
        $categoriesList = $categoriesQueryBuilder->getAll();
        $newsOne = $newsQueryBuilder->getNewsById($id);

        return \view('news.show', [
            'newsOne' => $newsOne,
            'categoriesList' => $categoriesList,
        ]);
    }
}
