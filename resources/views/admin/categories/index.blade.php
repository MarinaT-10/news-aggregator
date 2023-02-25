@extends('layouts.admin')
@section('title') Админпанель - категории @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Все категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
    <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
</div>
<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Дата добавления</th>
            <th>Дата изменения</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoriesList as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td><a href="{{ route('admin.categories.edit', ['category' =>$category->id]) }}">Изм.</a>&nbspl;
                <a href="javascript:;" class="delete" rel="{{ $category->id }}" style="color: red;">Уд.</a></td>
        </tr>
       @endforeach
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
                        send(`/admin/categories/${id}`).then(() => {
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
