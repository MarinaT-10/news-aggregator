<?php

namespace App\Http\Controllers\Admin;

use App\Enums\IsAdminStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function index(UsersQueryBuilder $usersQueryBuilder):View
    {
        return \view('admin.users.index', [
            'usersList' => $usersQueryBuilder->getUsersWithPagination(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        //
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
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {

        return \view('admin.users.edit', [
            'user' => $user,
            'statuses' => IsAdminStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());

        if($user->save()){
            return \redirect()
                ->route('admin.users.index')
                ->with('success', __('messages.admin.users.updateSuccess') );
        }
        return \back()
            ->with('error', __('messages.admin.users.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        //
    }
}
