@extends('layouts.app')

@section('title')
    Main
@endsection

@section('content')
    <div class="authorizationForm">
        <div class="content registration">
            <div class="loginForm__container">
                <div class="content__inner">
                    <div class="registration-form">
                        <h1>Авторизация</h1>
                        <form id="loginForm" method="post" action="{{ route('auth') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Логин:</label>
                                <input type="text" id="username" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input type="password" id="password" name="password">
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Войти">
                                <a href="{{ route('register') }}">Нет аккаунта?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
