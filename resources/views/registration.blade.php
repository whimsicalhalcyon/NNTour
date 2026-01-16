@extends('layout.app')
@section('title')
    Регистрация
@endsection
@section('content')
    <div class="container p-0">
        <div class="container-registration">
            <div class="container-fluid">
                <h1 class="main-text mb-5">Регистрация</h1>
                <form action="{{route('reg')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control input-reg @error('last_name') is-invalid @enderror" id="floatingInput" placeholder="Фамилия"
                               name="last_name">
                        <label for="floatingInput" class="form-input">Фамилия</label>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control input-reg @error('first_name') is-invalid @enderror" id="floatingInput"
                               placeholder="name@example.com" name="first_name">
                        <label for="floatingInput" class="form-input">Имя</label>
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control input-reg @error('phone') is-invalid @enderror" id="floatingInput"
                               placeholder="name@example.com" name="phone">
                        <label for="floatingInput" class="form-input">Телефон</label>
                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control input-reg @error('birthday') is-invalid @enderror" id="floatingInput"
                               placeholder="name@example.com" name="birthday">
                        <label for="floatingInput" class="form-input">Дата рождения</label>
                        @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control input-reg @error('email') is-invalid @enderror" id="floatingInput"
                               placeholder="name@example.com" name="email">
                        <label for="floatingInput" class="form-input">Адрес электронной почты</label>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="gender-checkbox mb-3 d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female"
                                   value="female">
                            <label class="form-check-label" for="female">
                                Женщина
                            </label>
                        </div>
                        <div class="form-check ms-4">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">
                                Мужчина
                            </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control input-reg @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Пароль"
                               name="password">
                        <label for="floatingPassword" class="form-input">Пароль</label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control input-reg @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Пароль"
                               name="password_confirmation">
                        <label for="password_confirmation" class="form-input">Повтор пароля</label>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary main-button reg-btn">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
@endsection
