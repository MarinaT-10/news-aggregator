<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $model = new News();
        $newsList = $model->getNews();
        $join = \DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftjoin('categories', 'chn.category_id', '=', 'categories.id')
            ->select("news.*", 'chn.category_id', 'categories.title as ctitle')
            ->get();

        $where = \DB::table('news')
            ->where([
                ['title', 'like','%at%'],
                ['id', '>','3']
            ])
            ->orWhere('status', '=', 'active')
            ->get();
//вывести данные между указанными значениями
        $where_between = \DB::table('news')
            ->whereBetween('id', [3,6])
            ->get();

//вывести данные кроме указанного диапазона
        $where_notbetween = \DB::table('news')
            ->whereNotBetween('id', [3,6])
            ->get();

//вывести данные конкретно указанные
        $where_in = \DB::table('news')
            ->whereIn('id', [3,6])
            ->get();

//вывести данные кроме конкретно указанных
        $where_notIn = \DB::table('news')
            ->whereNotIn('id', [3,6])
            ->get();

        //dd($join, $where, $where_between, $where_notbetween, $where_in, $where_notIn);

        return \view('admin.news.index', [
        'newsList' => $newsList,
        ]);
//        return \view('admin.news.index', [
//            'join' => $join,
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);
        return response()->json($request->only(['title', 'author', 'desription']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
