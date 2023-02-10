@extends('layouts.main')
@section('content')
    <div class="row mb-2">
@forelse ($newsList as $news)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary"> {{ $news->categories->map(fn($item) => $item->title)->implode(", " ) }}</strong>
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
        </div>
@empty
    <h2>Новостей нет</h2>
@endforelse
    <div>{{ $newsList->links() }}</div>
    </div>
@endsection


