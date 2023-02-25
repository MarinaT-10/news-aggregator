@extends('layouts.admin')
@section('title') Админпанель - пользователи @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать права пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
            <p><strong>Имя пользователя:</strong> {{ $user->name }}</p>
            <p><strong>Email пользователя:</strong> {{ $user->email }}</p>
            <br>
        <form method="post" action="{{ route('admin.users.update',['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="is_admin">Статус пользователя</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    @foreach($statuses as $status)
                        <option @if($user->is_admin === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn-success">Сохранить</button>
        </form>
    </div>
@endsection

