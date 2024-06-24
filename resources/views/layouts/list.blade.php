@foreach($games as $row)
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
