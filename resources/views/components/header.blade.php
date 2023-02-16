<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">

        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="{{ route('news') }}">Новостной портал</a>
        </div>

        <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="col-4 ">
                <a class="text-muted" href="{{ route('uploading.create') }}">Заказ</a>
            </div>
            <div class="col-4 ">
                <a class="text-muted " href="{{ route('info') }}">О нас</a>
            </div>
            @if (Auth::user())
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('account.logout') }}">Выйти</a>
            @else
                <div class="col-4"><a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Вход</a></div>
                <div><a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Регистрация</a></div>
            @endif

    </div>

    </div>
</header>
