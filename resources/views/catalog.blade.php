@extends('layouts.app')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__inner">
                <div class="list">
                    @include('layouts.list')
                </div>
                <div class="filterForm">
                    <form method="POST">
                        @csrf
                        <div class="catalog__form-group">
                            <h2>Платформа</h2>
                            <select name="platform" id="platform">
                                <option value="" class="option-color">Все</option>
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}" class="option-color">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="catalog__form-group">
                            <h2>Жанры</h2>
                            <select name="genre" id="genre">
                                <option value="" class="option-color">Все</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" class="option-color">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h2>Цена </h2>
                        <div class="catalog__form-group">
                            <label for="price_from">от:</label>
                            <input type="text" name="price_from" id="price_from">
                            <label for="price_to">до:</label>
                            <input type="text" name="price_to" id="price_to">
                        </div>

                        <div class="catalog__form-group">
                            <h2>Издатель</h2>
                            <select name="producer" id="producer">
                                <option value="" class="option-color">Все</option>
                                @foreach ($producers as $producer)
                                    <option value="{{ $producer->id }}" class="option-color">{{ $producer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="catalog__form-group">
                            <h2>Год</h2>
                            <input type="text" name="year" id="year">
                        </div>

                        <input type="submit">
                    </form>

                    <a href="{{route('catalog')}}">Сброс</a>
                </div>
            </div>
        </div>
    </div>


@endsection
