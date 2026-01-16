@extends('layout.app')
@section('title')
    Туры
@endsection
@section('content')
    <div class="container p-0">
        <div class="container-registration">
            <div class="container-fluid">
                <h1 class="main-text mb-5">Туры</h1>
                <button class="btn btn-secondary reg-btn" data-bs-toggle="modal" data-bs-target="#addTour">Добавить тур</button>
                <button class="btn btn-secondary reg-btn" data-bs-toggle="modal" data-bs-target="#addCity">Добавить город</button>
            </div>

{{--            Модалка с добавлением самого тура    --}}
            <div class="modal fade modal-main" id="addTour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="{{route('admin.tour.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-content modal-main" style="border:none; border-radius: 20px">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Создание тура</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control input-reg @error('title') is-invalid @enderror" id="floatingInput"
                                           placeholder="name@example.com" name="title">
                                    <label for="floatingInput" class="form-input">Название тура</label>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control input-reg @error('description') is-invalid @enderror" id="floatingInput"
                                           placeholder="name@example.com" name="description">
                                    <label for="floatingInput" class="form-input">Описание тура</label>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию">
                                        <option selected>Выберите город</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию">
                                        <option selected>Выберите экскурсовода</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$city->last_name}}{{$user->first_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control input-reg @error('startDate') is-invalid @enderror" id="floatingInput"
                                           placeholder="name@example.com" name="startDate">
                                    <label for="floatingInput" class="form-input">Дата тура</label>
                                    @error('startDate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control input-reg @error('price') is-invalid @enderror" id="floatingInput"
                                           placeholder="name@example.com" name="price">
                                    <label for="floatingInput" class="form-input">Цена</label>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Загрузите изображение</label>
                                    <input class="form-control input-reg" type="file" id="formFile" name="img">
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary secondary-button" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary main-button">Сохранить изменения</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

{{--            Модалка с добавлением точки отъезда --}}
            <div class="modal fade modal-main" id="addCity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="{{route('admin.city.store')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-content modal-main" style="border:none; border-radius: 20px">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление города</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control input-reg @error('name') is-invalid @enderror" id="floatingInput"
                                           placeholder="name@example.com" name="name">
                                    <label for="floatingInput" class="form-input">Название города</label>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary secondary-button" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary main-button">Сохранить изменения</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <style>
        button {
            border-radius: 20px !important;
        }

        .check-city {
            border-radius: 20px;
            padding: 15px 5px;
        }
    </style>
@endsection
