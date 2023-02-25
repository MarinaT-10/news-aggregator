@extends('layouts.admin')
@section('title') Админпанель - пользователи @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Статус пользователя</th>
                <th>Имя</th>
                <th>email</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td><a href="{{ route('admin.users.edit', ['user' =>$user->id]) }}">Изменить права</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $usersList->links() }}
    </div>
@endsection
