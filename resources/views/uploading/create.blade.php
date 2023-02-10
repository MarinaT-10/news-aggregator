@extends('layouts.feedback')
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h3 class="font-italic">Оформите заказ на получение выгрузки данных</h3>
        </div>
    </div>
@endsection
@section('content')
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('uploading.store') }}">
            @csrf
            <div class="form-group">
                <label for="author">Ваше имя</label>
                <input value="{{ old('author') }}" id="author" name="author" class="form-control"></input>
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input class="form-control" id="email" name="email" value="{{ old('email') }}"></input>
            </div>
            <div class="form-group">
                <label for="phone">Ваш номер телефона</label>
                <input class="form-control" id="phone" name="phone" value="{{ old('phone') }}"></input>
            </div>
            <div class="form-group">
                <label for="message">Опишите, что Вы хотите получить</label>
                <textarea type="text" id="message" name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn-success">Отправить</button>
        </form>
    </div>
@endsection

