@extends('layouts.feedback')
@section('title') Изменить отзыв @parent @stop
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <h3 class="font-italic">Изменить отзыв</h3>
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

        <form method="post" action="{{ route('admin.feedback.update', ['feedback' => $feedback]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="author">Ваше имя</label>
                <input class="form-control" id="author" name="author" value="{{ $feedback->author }}"></input>
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input class="form-control" id="email" name="email" value="{{ $feedback->email }}" ></input>
            </div>
            <div class="form-group">
                <label for="message">Комментарий/ отзыв по работе нашего сайта</label>
                <textarea type="text" id="message" name="message" class="form-control">{!! $feedback->message !!}</textarea>
                <script>
                    CKEDITOR.replace( 'message' );
                </script>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if($feedback->status === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn-success">Сохранить</button>
        </form>
    </div>
@endsection
