@extends('layouts.admin')
@section('title') Админпанель - добавить источник @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название ресурса</label>
                <input type="text" id="title" name="title" value="{{ $source->title }}" class="form-control" >
            </div>

            <div class="form-group">
                <label for="url">Ссылка</label>
                <input type="text" id="url" name="url" value="{{ $source->url }}" class="form-control" >
            </div>
            <br>
            <button type="submit" class="btn-success">Сохранить</button>
        </form>
    </div>
@endsection

