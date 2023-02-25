@extends('layouts.feedback')
@section('title') Отзывы @parent @stop
@section('info_title')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h3 class="font-italic">Ваши отзывы и обращения к нам</h3>
        </div>
    </div>
@endsection
@section('content')
    <div>
        <script src="https://cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
        <a href="{{route('feedback.create')}}">Оставить отзыв о работе сайта</a>
        <br>
        <br>
        @foreach ($feedbacks as $feedback)
            <div class="blog-post">
                <div class="card flex-md-row mb-4 box-shadow">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 ">From: {{ $feedback->author }}</strong>
                        <div class="mb-1 text-muted "> {{ $feedback->created_at }}</div>
                        <p class="card-text mb-auto" >{!! $feedback->message !!} </p>
                        <br>
                        <div class="mb-1 text-muted ">Статус: сообщение {{ $feedback->status }}</div>
                        @if(Auth::user()->is_admin === 'admin')
                        <div><a href="{{ route('admin.feedback.edit', ['feedback' =>$feedback]) }}">Изменить</a>&nbspl
                            <a href="javascript:;" class="delete" rel="{{ $feedback->id }}" style="color: red;"> Удалить</a></div>
                    </div>
                    @endif
                </div>
            </div><!-- /.blog-post -->
        @endforeach
            {{ $feedbacks->links() }}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                        send(`/admin/feedback/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
