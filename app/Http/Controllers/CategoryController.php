<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {

    }

    public function show(int $id): View
    {

        $model = new Category();
        $categoryOne = $model->getCategoryById($id);
        $categoriesList = $model->getCategories();


        $categoryNews = \DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftjoin('categories', 'chn.category_id', '=', 'categories.id')
            ->select("news.*", 'chn.category_id', 'categories.id','categories.title as ctitle')
            ->where('categories.id', '=', $categoryOne->id)
            ->get();


        return \view('categories.show', [
            'categoryOne' => $categoryOne,
            'categoriesList' => $categoriesList,
            'categoryNews' => $categoryNews
        ],
           );
    }
}
