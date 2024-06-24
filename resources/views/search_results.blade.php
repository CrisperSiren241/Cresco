@extends('layouts.app')

@section('content')
    <div class="searchResult">
        <div class="container">
            <div class="searchResult__inner">
                <div class="title_result">
                    <h1>Результаты поиска по запросу "{{ $searchText }}"</h1>
                </div>

                <div class="result_card">
                    @forelse ($games as $game)
                        <div class="block-image">
                            <img src="{{ $game->url }}">
                        </div>
                        <div class="block-info">
                            <h1>
                                <a href="{{ route('game.show', ['id' => $game->id]) }}">{{ $game->title }}</a>
                            </h1>
                            <h1>{{ $game->price }}</h1>
                        </div>
                    @empty
                        <h1>Ничего не найдено :(</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
