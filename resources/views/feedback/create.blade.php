@extends('layouts.feedback')
@section('title') Создать отзыв @parent @stop
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h3 class="font-italic">Вы можете написать нам</h3>
        </div>
    </div>
@endsection
@section('content')
    <script src="https://cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
<div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
       <div class="form-group">
            <label for="author">Ваше имя</label>
            <input class="form-control @error('author') is-invalid @enderror" id="author" name="author"></input>
        </div>
        <div class="form-group">
            <label for="email">Ваш email</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"></input>
        </div>
        <div class="form-group">
            <label for="message">Комментарий/ отзыв по работе нашего сайта</label>
            <textarea type="text" id="message" name="message" class="form-control @error('message') is-invalid @enderror"></textarea>
            <script>
                CKEDITOR.replace( 'message' );
            </script>
        </div>
        <br>
        <button type="submit" class="btn-success">Отправить</button>
    </form>
</div>
@endsection
