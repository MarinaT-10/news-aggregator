@extends('layouts.feedback')
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h3 class="font-italic">Ваши отзывы и обращения к нам</h3>
        </div>
    </div>
@endsection
@section('content')
    <div>
        @foreach ($feedbacks as $feedback)
            <div class="blog-post">
                <div class="card flex-md-row mb-4 box-shadow">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 ">From: {{ $feedback->author }}</strong>
                        <div class="mb-1 text-muted "> {{ $feedback->created_at }}</div>
                        <p class="card-text mb-auto" >{{ $feedback->message }}</p>
                        <br>
                        <div class="mb-1 text-muted ">Статус: сообщение {{ $feedback->status }}</div>
                        <div><a href="{{ route('feedback.edit', ['feedback' =>$feedback]) }}">Изменить</a>&nbspl<a href="" style="color: red;"> Удалить.</a></div>
                    </div>
                </div>
            </div><!-- /.blog-post -->
        @endforeach
            {{ $feedbacks->links() }}
    </div>
@endsection
