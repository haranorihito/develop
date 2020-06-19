<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            @if (Route::has('login'))
                <div style="width:100%; height:65px;">
                    <div class="top-right links">
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                    <div class="top-label links">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/Favorite Shop Share (1).png') }}"></a>
                    </div>
                    <div class="top-left links">
                        <a href="{{ url('admin/food/create') }}">投稿する</a>
                    </div>
                </div>
            @endif
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="{{ route('food', ['genre' => 'ラーメン']) }}">ラーメン</a>
                    <a class="nav-item nav-link" href="{{ route('food', ['genre' => '中華']) }}">中華</a>
                    <a class="nav-item nav-link" href="{{ route('food', ['genre' => 'イタリアン']) }}">イタリアン</a>
                    <a class="nav-item nav-link" href="{{ route('food', ['genre' => '和食']) }}">和食</a>
                    <a class="nav-item nav-link" href="{{ route('food', ['genre' => 'スイーツ']) }}">スイーツ</a>
                </div>
            </nav>
        </header>
        <main class="main_space">
            @yield('content')
        </main>
    </body>
    <footer>
        <p class="copyright">(C) 2020 Favorite Shop Share</p>
    </footer>
</html>
