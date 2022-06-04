<nav id="sidebarMenu" style="width: 100%">
    <ul class="nav flex-row">
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('news.categories')) active @endif" href="{{ route('news.categories') }}">
              Категории новостей
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('user.feedback.index')) active @endif" href="{{ route('user.feedback.index') }}">
                Оставить отзыв
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('user.order.index')) active @endif" href="{{ route('user.order.index') }}">
                Заказать источник
            </a>
        </li>
        @if (Auth::user() && Auth::user()->is_admin)
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
                Админка
            </a>
        </li>
        @endif
    </ul>
</nav>
