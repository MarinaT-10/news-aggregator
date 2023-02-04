<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;



class NewsController extends Controller
{

    public function index(): View
    {
        $modelCategory = new Category();
        $categoriesList = $modelCategory->getCategories();

        $newsList = \DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftjoin('categories', 'chn.category_id', '=', 'categories.id')
            ->select("news.*", 'chn.category_id', 'categories.title as ctitle')
            ->get();


        return \view('news.index', [
            'categoriesList' => $categoriesList,
            'newsList' => $newsList,
        ]);
    }


    public function show(int $id): View
    {
        $modelCategory = new Category();
        $categoriesList = $modelCategory->getCategories();

        $model = new News();
        $newsOne = $model->getNewsById($id);

        return \view('news.show', [
            'newsOne' => $newsOne,
            'categoriesList' => $categoriesList,
        ]);
    }

}
