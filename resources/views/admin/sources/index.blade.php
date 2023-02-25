@extends('layouts.admin')
@section('title') Админпанель - источники @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список ресурсов</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
        <a href="{{ route('admin.sources.create') }}">Добавить источник</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название</th>
                <th>Ссылка</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sourcesList as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->title }}</td>
                    <td>{{ $source->url }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td><a href="{{ route('admin.sources.edit', ['source' =>$source]) }}">Изм.</a>&nbspl;
                        <a href="javascript:;" class="delete" rel="{{ $source->id }}" style="color: red;">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
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
                        send(`/admin/sources/${id}`).then(() => {
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