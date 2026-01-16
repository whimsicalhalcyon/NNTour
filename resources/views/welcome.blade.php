@extends('layout.app')
@section('title')
    Главная
@endsection
@section('content')
    <div class="container p-0">
        {{--   Главный баннер  --}}
        <div class="container-section">
            <div class="container-fluid h-100 d-flex align-items-center justify-content-center">
                <h1 class="text-white text-center lh-lg">
                    <span class="main-section-span">Приключения</span> и отдых в
                    <span class="main-section-span">Нижнем Новгороде</span>.
                    <span class="main-section-span">Уникальные</span> туры для активного отдыха
                </h1>
            </div>
        </div>

        {{-- Поиск туров --}}
        <div class="container-search mt-5">
            <div class="container-fluid d-flex">
                <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    <option value="1">Один</option>
                    <option value="2">Два</option>
                    <option value="3">Три</option>
                </select>
                <input type="date" class="form-control me-2">
                <input type="date" class="form-control me-2" >
                <input type="text" class="form-control me-2" placeholder="Количество туристов">
                <button class="btn btn-primary main-button">Применить</button>
            </div>
        </div>

        {{--   Слайдер с акциями     --}}
        <div class="container-sale-slider mt-5">
            <div class="container-fluid d-flex">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="https://yandex.ru/images/search?from=tabbar&img_url=http%3A%2F%2Frewizor.ru%2Ffiles%2F110369vw8k.jpg&lr=47&pos=28&rpt=simage&text=%D0%BD%D0%B8%D0%B6%D0%BD%D0%B8%D0%B9%20%D0%BD%D0%BE%D0%B2%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%20%D0%B2%20%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%BC%20%D0%BA%D0%B0%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%B5" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Метка первого слайда</h5>
                                <p>Некоторый репрезентативный заполнитель для первого слайда.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://yandex.ru/images/search?from=tabbar&img_url=http%3A%2F%2Frewizor.ru%2Ffiles%2F110369vw8k.jpg&lr=47&pos=28&rpt=simage&text=%D0%BD%D0%B8%D0%B6%D0%BD%D0%B8%D0%B9%20%D0%BD%D0%BE%D0%B2%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%20%D0%B2%20%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%BC%20%D0%BA%D0%B0%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%B5" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Метка второго слайда</h5>
                                <p>Некоторый репрезентативный заполнитель для второго слайда.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://yandex.ru/images/search?from=tabbar&img_url=http%3A%2F%2Frewizor.ru%2Ffiles%2F110369vw8k.jpg&lr=47&pos=28&rpt=simage&text=%D0%BD%D0%B8%D0%B6%D0%BD%D0%B8%D0%B9%20%D0%BD%D0%BE%D0%B2%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%20%D0%B2%20%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%BC%20%D0%BA%D0%B0%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%B5" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Метка третьего слайда</h5>
                                <p>Некоторый репрезентативный заполнитель для третьего слайда.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
