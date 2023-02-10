@extends('layouts.feedback')
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h3 class="font-italic">Вы можете написать нам</h3>
        </div>
    </div>
@endsection
@section('content')
<div>
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
       <div class="form-group">
            <label for="author">Ваше имя</label>
            <input class="form-control" id="author" name="author"></input>
        </div>
        <div class="form-group">
            <label for="email">Ваш email</label>
            <input class="form-control" id="email" name="email"></input>
        </div>
        <div class="form-group">
            <label for="message">Комментарий/ отзыв по работе нашего сайта</label>
            <textarea type="text" id="message" name="message" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn-success">Отправить</button>
    </form>
</div>
@endsection
