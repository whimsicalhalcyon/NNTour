@extends('layout.app')
@section('title')
    Личный кабинет
@endsection
@section('content')
    <div class="container p-0">
        <div class="container-registration">
            <div class="container-fluid">
                <h1 class="main-text mb-5">Личный кабинет</h1>
                <div class="section-profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="username">
                                    <div class="fio-container d-flex justify-content-between align-items-md-center w-75 p-2">
                                        <p class="text-user">{{$user->first_name}}</p>
                                        <p class="text-user">{{$user->last_name}}</p>
                                    </div>
                                    <button class="btn btn-primary main-button" data-bs-toggle="modal" data-bs-target="#editProfile">Редактировать профиль</button>
                                </div>
                                <div class="analytics-state">
                                    <p class="state">Количество посещенных туров</p>
                                    <p class="state">0</p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="tours-list g-4">
                                    @foreach($tours as $tour)
                                        <div class="col">
                                            <div class="card tour-card mb-3" style="width: 100%" >
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
                                                    <button class="btn border-button">Отменить бронь</button>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"  style="border:none; border-radius: 20px">
                <form action="{{route('profile.update')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование профиля</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-reg @error('last_name') is-invalid @enderror" id="floatingInput" placeholder="Фамилия"
                                   name="last_name" value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}">
                            <label for="floatingInput" class="form-input">Фамилия</label>
                            @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-reg @error('first_name') is-invalid @enderror" id="floatingInput"
                                   placeholder="name@example.com" name="first_name" value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}">
                            <label for="floatingInput" class="form-input">Имя</label>
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-reg @error('phone') is-invalid @enderror" id="floatingInput"
                                   placeholder="name@example.com" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                            <label for="floatingInput" class="form-input">Телефон</label>
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control input-reg @error('birthday') is-invalid @enderror" id="floatingInput"
                                   placeholder="name@example.com" name="birthday" value="{{\Illuminate\Support\Facades\Auth::user()->birthday}}">
                            <label for="floatingInput" class="form-input">Дата рождения</label>
                            @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control input-reg @error('email') is-invalid @enderror" id="floatingInput"
                                   placeholder="name@example.com" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                            <label for="floatingInput" class="form-input">Адрес электронной почты</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary main-button">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .username, .analytics-state{
            background-color: rgba(217, 217, 217, 0.45);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .text-user {
            font-size: 20px;
        }
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

        .border-button {
            background-color: inherit;
            border: 1px solid #D91818 ;
            color: #D91818;
        }
        .border-button:hover {
            background-color: #D91818;
            color: white;
        }


    </style>
@endsection
