@extends('layouts.app')

@section('content')
<div class="profile">
    <div class="container">
        <div class="profile__inner">
            <div class="content">
                <h1 class="info_blue">Товары в избранном</h1>
                <div class="content__card">
                    @foreach ($games as $row)
                    <a href="{{ route('game.show', ['id' => $row->id]) }}">
                        <div class="catalog__card">
                            <div class="block-image">
                                <div class="blacker_blur"></div>
                                <img src="{{ $row->url }}">
                                <p class="title">{{ $row->title }}</p>
                            </div>
                            <div class="block-info">
                                <p>{{  $row->price - $row->price * $row->discount}} руб.</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="avatar">
                <h1>{{Auth::user()->username}}</h1>
                <p>{{Auth::user()->email}}</p>


                 <button>
                    <a href="{{route('logout')}}">Выйти</a>
                 </button>
            </div>

        </div>
    </div>
</div>
@endsection
