@extends('layout.app')
@section('title')
    Авторизация
@endsection
@section('content')
    <div class="container p-0">
        <div class="container-registration">
            <div class="container-fluid">
                <h1 class="main-text mb-5">Авторизация</h1>
                <form action="{{route('auth')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control input-reg @error('email') is-invalid @enderror" id="floatingInput"
                               placeholder="name@example.com" name="email">
                        <label for="floatingInput" class="form-input">Адрес электронной почты</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control input-reg @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Пароль"
                               name="password">
                        <label for="floatingPassword" class="form-input">Пароль</label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary main-button reg-btn">Войти</button>
                </form>
            </div>
        </div>
    </div>
@endsection
