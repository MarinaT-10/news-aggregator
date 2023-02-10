<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\FeedbackStatus;
use App\Models\Feedback;
use App\QueryBuilders\FeedbackQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(FeedbackQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('feedback.index', [
        'feedbacks' => $feedbackQueryBuilder->getFeedbackWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FeedbackQueryBuilder $feedbackQueryBuilder
     * @return View
     */
    public function create(FeedbackQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('feedback.create', [
            'feedbacks' => $feedbackQueryBuilder->getAll(),
            'statuses' => FeedbackStatus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//        //Записываем данные в файл
//        $filename = "feedback.txt";
//        $data = response()->json($request->all());
//        $file = \file_put_contents(
//            $filename, $data, FILE_APPEND
//        );
//        return response()->json($request->only(['author', 'comment']));

        $feedback = new Feedback($request->except('_token'));

        if($feedback->save()){
            return redirect()->route('feedback.index')->with('success', 'Отзыв успешно добавлен');
        }

        $request->validate([
            'author' => 'required',
            'message' => 'required',
            'email' => 'required',
        ]);

        return \back()->with('error', 'Не удалось отправить отзыв');
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
     * @param Feedback $feedback
     * @param FeedbackStatus $feedbackStatus
     * @return View
     */
    public function edit(Feedback $feedback): View
    {
        return \view('feedback.edit', [
            'feedback' => $feedback,
            'statuses' => FeedbackStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        $feedback = $feedback->fill($request->except('_token'));
        if($feedback->save()){
            return \redirect()->route('feedback.index')->with('success', 'Отзыв успешно обновлен');
        }
        return \back()->with('error', 'Не удалось сохранить отзыв');
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
