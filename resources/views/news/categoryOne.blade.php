@extends('layouts.category')
@section('category_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class=" px-0">
            <h1 class="display-4 font-italic">{{ $categories['name'] }} - заголовок категории</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-md-8 blog-main">
@foreach ($news as $n)
    <div class="blog-post">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{ $n['author'] }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="{ route('news.show', ['id'=>$n['id']]) }}">{{ $n['title'] }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $n['created_at'] }}</div>
                <p class="card-text mb-auto">{!! $n['description'] !!}</p>
                <a href="{{ route('news.show', ['id'=>$n['id']]) }}">Читать далее</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
    </div><!-- /.blog-post -->
@endforeach
    </div><!-- /.blog-main -->
@endsection

