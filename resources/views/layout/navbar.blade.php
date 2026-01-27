<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-main">
    <div class="container">
        <a class="navbar-brand nav-item" href="{{route('welcome')}}">НН Тур</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Рекомендуемые</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Цена</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('authorization')}}">Авторизация</a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile')}}">Личный кабинет</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.tour')}}">Туры</a></li>
                            <li><a class="dropdown-item" href="#">Другое действие</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Выход</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
