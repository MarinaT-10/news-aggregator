<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $categoriesList = $categoriesQueryBuilder->getAll();
        return \view('admin.categories.index', [
            'categoriesList' => $categoriesList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.create',
//            [
//            'categories' => $categoriesQueryBuilder->getAll(),
//            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category = new Category($request->except('_token'));

        if($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить категорию');
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
    public function edit(Category $category, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.edit',[
            'category' => $category,
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->except('_token'));
        if($category->save()){
            return \redirect()->route('admin.categories.index')->with('success', 'Категория успешно обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить категорию');
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
