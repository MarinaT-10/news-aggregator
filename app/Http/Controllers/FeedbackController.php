<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\FeedbackStatus;
use App\Http\Requests\Feedback\CreateRequest;
use App\Http\Requests\Feedback\EditRequest;
use App\Models\Feedback;
use App\QueryBuilders\FeedbackQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param FeedbackQueryBuilder $feedbackQueryBuilder
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $feedback = new Feedback($request->validated());

        if($feedback->save()){
            return redirect()
                ->route('feedback.index')
                ->with('success', __('messages.feedback.success'));
        }

        return \back()
            ->with('error', __('messages.feedback.fail'));

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
     * @param EditRequest $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Feedback $feedback): RedirectResponse
    {
        $feedback = $feedback->fill($request->validated());

        if($feedback->save()){
            return \redirect()
                ->route('feedback.index')
                ->with('success', __('messages.feedback.updateSuccess'));
        }
        return \back()
            ->with('error', __('messages.feedback.fail'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return JsonResponse
     */
    public function destroy(Feedback $feedback): JsonResponse
    {
        try{
            $feedback->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
