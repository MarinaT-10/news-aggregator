<footer class="blog-footer">
    <p>{{ $text }}</p>
        <p>
            <a href="{{route('feedback.create')}}">Оставить отзыв о работе сайта</a>
        </p>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('feedback.index') }}">Ваши отзывы о работе сайта</a>
    <p>
        <a href="#">вверх</a>
    </p>
</footer>


