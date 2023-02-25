<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link btn-outline-secondary" href="{{ route('news') }}">
                    <span data-feather="home"></span><strong>
                    На главную сайта </strong><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index'))active @endif" href="/admin">
                    <span data-feather="home"></span>
                    Главная админки <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*'))active @endif" href="/admin/categories">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*'))active @endif" href="/admin/news">
                    <span data-feather="book"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.sources.*'))active @endif" href="/admin/sources">
                    <span data-feather="file"></span>
                    Источники
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*'))active @endif" href="/admin/users">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>
        </ul>
    </div>
</nav>
