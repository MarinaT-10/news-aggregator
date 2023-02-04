@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Все категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
</div>
<div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="/news">Главная</a>
            @foreach ($categoriesList as $category)
                <a class="p-2 text-muted" href="{{ route('categories.show', ['id'=>$category->id]) }}">{{ $category->title}}</a>
            @endforeach
        </nav>
    </div>
<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Дата добавления</th>
            <th>Дата изменения</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoriesList as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td><a href="">Изм.</a>&nbspl;<a href="" style="color: red;">Уд.</a></td>
        </tr>
       @endforeach
        </tbody>
    </table>
</div>
@endsection
