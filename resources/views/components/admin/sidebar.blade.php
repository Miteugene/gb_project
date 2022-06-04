<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
              Главная
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
              Категории
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
              Новости
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
                Пользователи
            </a>
        </li>
    </ul>
  </div>
</nav>
