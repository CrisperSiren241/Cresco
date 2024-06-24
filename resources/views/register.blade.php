@extends('layouts.app')

@section('title')
    Main
@endsection

@section('content')
    <div class="loginFrom">
        <div class="content registration">
            <div class="loginForm__container">
                <div class="content__inner">
                    <div class="registration-form">
                        <h1>Регистрация</h1>
                        <form id="registrationForm" method="post" action="{{ route('registration') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Логин:</label>
                                <input type="text" id="username" name="username">
                                <span class="error-message" id="usernameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email">
                                <span class="error-message" id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input type="password" id="password" name="password">
                                <span class="error-message" id="passwordError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Подтверждение пароля:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation">
                                <span class="error-message" id="passwordConfirmationError"></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Зарегистрироваться">
                                <a href="{{ route('login') }}">Уже есть аккаунт?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const registrationRoute = "{{ url('registration') }}";
        const mainRoute = "{{ url('main') }}";
    </script>
@endsection
