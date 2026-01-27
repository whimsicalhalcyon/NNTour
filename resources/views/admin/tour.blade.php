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
                                    <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию" name="city_id">
                                        <option selected>Выберите город</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию" name="user_id">
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


{{--            Список туров  --}}
            <div class="tours-list mt-5 row row-cols-1 row-cols-md-3 g-4">
                @foreach($tours as $tour)
                    <div class="col">
                        <div class="card tour-card" style="width: 100%">
                            <div class="card-image-container">
                                <img src="{{ $tour->img }}" class="card-img-top" alt="{{ $tour->title }}">
                                @if($tour->status)
                                    <div class="tour-status-badge">{{ $tour->status == 'active' ? 'Активен': 'Завершен' }}</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $tour->title }}</h5>
                                <p class="card-text text-muted description-truncate">{{ $tour->description }}</p>

                                <div class="tour-details">
                                    <div class="detail-item">
                                        <i class="bi bi-calendar3"></i>
                                        <span>{{ $tour->startDate }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="bi bi-tag"></i>
                                        <span class="tour-price">{{ $tour->price }}</span>
                                    </div>
                                </div>

                                <div class="btn-panel d-flex gap-2">
                                    <button class="btn btn-outline-primary btn-edit main-button text-white flex-grow-1"  data-bs-toggle="modal" data-bs-target="#editTour{{$tour->id}}">Редактировать</button>
                                    <form action="{{route('admin.tour.destroy', ['tour'=>$tour])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


{{--                Модальное окно для редактирования --}}
                    <div class="modal fade modal-main" id="editTour{{$tour->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="{{route('admin.tour.update', ['tour'=>$tour])}}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-content modal-main" style="border:none; border-radius: 20px">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Создание тура</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control input-reg @error('title') is-invalid @enderror" id="floatingInput"
                                                   placeholder="name@example.com" name="title" value="{{$tour->title}}">
                                            <label for="floatingInput" class="form-input">Название тура</label>
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control input-reg @error('description') is-invalid @enderror" id="floatingInput"
                                                   placeholder="name@example.com" name="description" value="{{$tour->description}}">
                                            <label for="floatingInput" class="form-input">Описание тура</label>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию" name="city_id">
                                                <option selected>Выберите город</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select check-city me-2" aria-label="Пример выбора по умолчанию" name="user_id">
                                                <option selected>Выберите экскурсовода</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$city->last_name}}{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control input-reg @error('startDate') is-invalid @enderror" id="floatingInput"
                                                   placeholder="name@example.com" name="startDate" value="startDate">
                                            <label for="floatingInput" class="form-input">Дата тура</label>
                                            @error('startDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control input-reg @error('price') is-invalid @enderror" id="floatingInput"
                                                   placeholder="name@example.com" name="price" value="{{$tour->price}}">
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

                @endforeach
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

    <style>
        .tour-card {
            width: 30rem;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .tour-status-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.9);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            backdrop-filter: blur(4px);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #2c3e50;
        }

        .description-truncate {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1.25rem;
            line-height: 1.5;
        }

        .tour-details {
            border: 1px solid #D9D9D9;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 0.5rem;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-item i {
            color: #6c757d;
            width: 20px;
        }

        .tour-price {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-edit {
            border-width: 1px;
            font-weight: 500;
        }

        .btn-delete {
            border-width: 1px;
            width: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-panel {
            margin-top: 1rem;
        }
    </style>
@endsection
