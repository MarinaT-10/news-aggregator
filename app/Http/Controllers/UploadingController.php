<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Uploading;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UploadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return \view('uploading.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('uploading.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
//        $request->validate([
//            'author' => 'required',
//            'email' => 'required',
//            'phone' => 'required',
//            'manual' => 'required',
//        ]);
//
//        //Записываем данные в файл
//        $filename = "uploading.txt";
//        $data = response()->json($request->all());
//        $file = \file_put_contents(
//            $filename, $data, FILE_APPEND
//        );
//        return response()->json($request->only(['author', 'comment']));

        $request->validate([
            'author' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $uploading = new Uploading($request->except('_token'));

        if($uploading->save()) {
            return redirect()->route('news')->with('success', 'Заявка успешно добавлена');
        }

        return \back()->with('error', 'Не удалось оформить заявку');
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
