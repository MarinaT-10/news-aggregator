@extends('layouts.category')
@section('menu')
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="/news">Главная</a>
            @foreach ($categoriesList as $category)
                <a class="p-2 text-muted" href="{{ route('categories.show', ['id'=>$category->id]) }}">{{ $category->title}}</a>
            @endforeach
        </nav>
    </div>
@endsection
@section('category_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class=" px-0">
            <h1 class="display-4 font-italic">{{ $categoryOne->title }}</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-8 blog-main">
@foreach ($categoryNews as $news)
            <div class="blog-post">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ $categoryOne->title }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ route('news.show', ['id'=>$news->id]) }}">{{ $news->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $news->created_at }}</div>
                        <p class="card-text mb-auto">{{ $news->description }}</p>
                        <strong class="d-inline-block mb-2 ">Автор: {{ $news->author }}</strong>
                        <a href="{{ route('news.show', ['id'=>$news->id]) }}">Читать далее</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
                </div>
            </div><!-- /.blog-post -->
        @endforeach
    {{ $categoryNews->links() }}
    </div><!-- /.blog-main -->
@endsection
@section('sidebar')
    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
        <div class="p-3">
            <h4 class="font-italic">К другим новостям</h4>
            <ol class="list-unstyled mb-0">
                @foreach ($categoriesList as $category)
                    <li><a href="{{ route('categories.show', ['id'=>$category->id]) }}">{{ $category->title}}</a></li>
                @endforeach
            </ol>
        </div>
    </aside><!-- /.blog-sidebar -->
@endsection

