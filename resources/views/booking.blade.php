@extends('layout.app')
@section('title')
    Забронировать тур
@endsection
@section('content')
    <div class="container p-0">
        <div class="container-registration">
            <div class="tours-list mt-5">
                <div class="col p-0">
                    <div class="card tour-card border-0 p-0" style="width: 100%">
                        <div class="card-image-container p-0">
                            <img src="{{$tour->img}}" class="card-img-top" alt="{{ $tour->title }}">
                            @if($tour->status)
                                <div
                                    class="tour-status-badge">{{ $tour->status == 'active' ? 'Активен': 'Завершен' }}</div>
                            @endif
                        </div>
                        <div class="card-body p-0">
                            <h5 class="card-title mt-4">{{ $tour->title }}</h5>
                            <p class="card-text text-muted description-truncate">{{ $tour->description }}</p>

                            <div class="tour-details">
                                <div class="detail-item">
                                    <i class="bi bi-calendar3"></i>
                                    <span>{{ $tour->startDate }}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="bi bi-tag main-text"></i>
                                    <span class="tour-price main-text">{{ $tour->price }}</span>
                                </div>
                            </div>

                            <button class="btn main-button text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Забронировать
                            </button>
                            <div class="collapse mt-3" id="collapseExample">
                                <div class="card card-body">
                                    Некоторый заполнитель для компонента сворачивания. Эта панель по умолчанию скрыта, но открывается, когда пользователь активирует соответствующий триггер.
                                </div>
                            </div>
                        </div>
                    </div>
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

        img {
            height: 500px !important;
        }
    </style>
@endsection
