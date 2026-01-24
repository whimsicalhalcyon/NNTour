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
                        @foreach($tours as $tour)
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{$tour->img}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Метка первого слайда</h5>
                                    <p>Некоторый репрезентативный заполнитель для первого слайда.</p>
                                </div>
                            </div>
                        @endforeach
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
