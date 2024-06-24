<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="../node_modules/slick-carousel/slick/slick-theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">

                <a href="{{ route('main') }}">
                    <div class="logo">
                        <svg width="91" height="91" viewBox="0 0 91 91" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M53.1062 22.5608L53.4659 7.1875L10.6933 38.4602L9.13511e-05 46.2784L0 46.2784L10.3335 53.8335L51.6674 84.0542L52.0271 68.6809L21.0267 46.0153L53.1062 22.5608Z"
                                fill="#6DCCF2" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M53.1062 22.5608L53.4659 7.1875L10.6933 38.4602L9.13511e-05 46.2784L0 46.2784L10.3335 53.8335L51.6674 84.0542L52.0271 68.6809L21.0267 46.0153L53.1062 22.5608Z"
                                fill="url(#paint0_linear_268_1171)" fill-opacity="0.2" />
                            <path
                                d="M60.3422 61.7798C57.7626 61.7798 55.3443 61.4131 53.0872 60.6798C50.8301 59.9171 48.8515 58.8317 47.1514 57.4237C45.4512 56.0157 44.1175 54.329 43.1501 52.3636C42.2121 50.3982 41.7431 48.2275 41.7431 45.8514C41.7431 43.534 42.2268 41.422 43.1941 39.5153C44.1614 37.5792 45.4952 35.9072 47.1953 34.4991C48.8955 33.0618 50.8594 31.9617 53.0872 31.1991C55.3443 30.4364 57.748 30.055 60.2982 30.055C62.2622 30.055 64.1529 30.2897 65.9703 30.7591C67.7877 31.1991 71.5544 32.5596 71.5544 32.5596V34.8555V40.4908C70.6457 39.7575 69.0335 38.8113 67.9489 38.1952C66.8643 37.5792 65.6478 37.0952 64.2994 36.7432C62.9803 36.3619 61.4854 36.1712 59.8145 36.1712C58.4368 36.1712 57.0738 36.3912 55.7254 36.8312C54.4063 37.2712 53.1898 37.9019 52.0759 38.7232C50.9914 39.5446 50.112 40.5713 49.4378 41.8033C48.7929 43.006 48.4704 44.3701 48.4704 45.8954C48.4704 47.5088 48.8075 48.9315 49.4817 50.1635C50.1852 51.3956 51.1233 52.4222 52.2958 53.2436C53.4683 54.065 54.7874 54.681 56.253 55.0916C57.7187 55.5023 59.2283 55.7077 60.7819 55.7077C62.482 55.7077 63.9916 55.4877 65.3107 55.0476C66.6298 54.5783 67.8023 54.021 68.8283 53.3756C69.8542 52.7303 70.7629 52.1142 71.5544 51.5276V57.1881V58.6491C71.5544 58.6491 68.1101 60.4304 66.2341 60.9878C64.3874 61.5158 62.4234 61.7798 60.3422 61.7798Z"
                                fill="#6DCCF2" />
                            <path
                                d="M60.3422 61.7798C57.7626 61.7798 55.3443 61.4131 53.0872 60.6798C50.8301 59.9171 48.8515 58.8317 47.1514 57.4237C45.4512 56.0157 44.1175 54.329 43.1501 52.3636C42.2121 50.3982 41.7431 48.2275 41.7431 45.8514C41.7431 43.534 42.2268 41.422 43.1941 39.5153C44.1614 37.5792 45.4952 35.9072 47.1953 34.4991C48.8955 33.0618 50.8594 31.9617 53.0872 31.1991C55.3443 30.4364 57.748 30.055 60.2982 30.055C62.2622 30.055 64.1529 30.2897 65.9703 30.7591C67.7877 31.1991 71.5544 32.5596 71.5544 32.5596V34.8555V40.4908C70.6457 39.7575 69.0335 38.8113 67.9489 38.1952C66.8643 37.5792 65.6478 37.0952 64.2994 36.7432C62.9803 36.3619 61.4854 36.1712 59.8145 36.1712C58.4368 36.1712 57.0738 36.3912 55.7254 36.8312C54.4063 37.2712 53.1898 37.9019 52.0759 38.7232C50.9914 39.5446 50.112 40.5713 49.4378 41.8033C48.7929 43.006 48.4704 44.3701 48.4704 45.8954C48.4704 47.5088 48.8075 48.9315 49.4817 50.1635C50.1852 51.3956 51.1233 52.4222 52.2958 53.2436C53.4683 54.065 54.7874 54.681 56.253 55.0916C57.7187 55.5023 59.2283 55.7077 60.7819 55.7077C62.482 55.7077 63.9916 55.4877 65.3107 55.0476C66.6298 54.5783 67.8023 54.021 68.8283 53.3756C69.8542 52.7303 70.7629 52.1142 71.5544 51.5276V57.1881V58.6491C71.5544 58.6491 68.1101 60.4304 66.2341 60.9878C64.3874 61.5158 62.4234 61.7798 60.3422 61.7798Z"
                                fill="url(#paint1_linear_268_1171)" fill-opacity="0.2" />
                            <defs>
                                <linearGradient id="paint0_linear_268_1171" x1="52.6308" y1="80.9323" x2="53.6239"
                                    y2="26.8119" gradientUnits="userSpaceOnUse">
                                    <stop />
                                    <stop offset="1" stop-color="white" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_268_1171" x1="58.22" y1="37.6355" x2="58.901"
                                    y2="61.7609" gradientUnits="userSpaceOnUse">
                                    <stop stop-opacity="0" />
                                    <stop offset="1" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </a>

                <form action="{{ route('search') }}" method="GET" class="header__search">
                    <input class="search_field" onclick="Enter" type="text" placeholder="Найти" name="search_text">
                </form>

                <div class="header__nav">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{ route('catalog') }}">Каталог &blacktriangledown;</a>
                                <ul>
                                    @foreach ($category as $cat)
                                        <li><a href="#">{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>О нас</li>
                            <li>$ &blacktriangledown;</li>
                        </ul>
                    </nav>
                </div>

                @if (Auth::check())
                    <a href="{{route('profile')}}">{{Auth::user()->username}}</a>
                @else
                    <a href="{{ route('login') }}">Войти</a>
                @endif

            </div>
        </div>
    </header>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('js/app.js') }}"></script>
</body>

</html>
