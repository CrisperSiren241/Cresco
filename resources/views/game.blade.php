@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="container">
            <div class="card__inner">
                <div class="info_cover">
                    <img src="{{ $game->url }}" alt="Cover Image">
                    <p>Жанр: <span class="info_blue">{{ $game->genre->name }}</span></p>
                    <p>Платформа: <span class="info_blue">{{ $game->platform->name }}</span></p>
                    <p>Дата выхода: <span class="info_blue">{{ $game->date }}</span></p>
                    <p>Издатель: <span class="info_blue">{{ $game->producer->name }}</span></p>
                </div>
                <div class="info_text">
                    <div class="desc">
                        <h1>{{ $game->title }} <span class="discount">{{ $game->discount * 100 }}%</span></h1>
                        <h2 class="contain info_blue">В наличии</h2>

                        <p>Поддержка языков:</p>
                        <p class="info_blue">{{ $game->lang_support->name }}</p>

                        <p>Сервис активации:</p>
                        <p class="info_blue">{{ $game->service->name }}</p>
                    </div>
                    <div class="btn">
                        @auth
                            <button id="favoriteButton" data-game-id="{{ $game->id }}">
                                {{ $isFavorite ? 'Убрать' : 'Добавить' }}
                            </button>
                        @endauth
                        <button id="buyButton" data-game-id="{{ $game->id }}">
                            {{ $game->price - $game->price * $game->discount }} руб.
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteButton = document.getElementById('favoriteButton');

            favoriteButton.addEventListener('click', function() {
                const gameId = this.getAttribute('data-game-id');
                const url = this.textContent.trim() === 'Добавить' ? '{{ route('favorite.add') }}' :
                    '{{ route('favorite.remove') }}';

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _token: '{{ csrf_token() }}',
                            game_id: gameId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'added') {
                            this.textContent = 'Убрать';
                        } else if (data.status === 'removed') {
                            this.textContent = 'Добавить';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
