@extends('layouts.app')

@section('content')
    <div class="col-8 offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" style="width:200px;">
        @endif
        <br>
        <div class="col-4">
            @if(Auth::user()->is_admin === 'admin')
                <a href="{{ route('admin.index') }}">В админку</a>
            @endif
        </div>
        <br>
        <div class="col-4">
            <a href="{{ route('news') }}">К новостям</a>
        </div>
    </div>
@endsection
