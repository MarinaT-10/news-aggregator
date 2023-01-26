@foreach ($categories as $c)
    <a class="p-2 text-muted" href="{{ route('categories.show', ['id'=>$c['id']]) }}">{{ $c['name'] }}</a>
@endforeach




