@extends('layouts.top')


@section('title', 'Favorite Shop Share')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <div class="top_picture">
                <img src="{{ asset('img/meet.jpg') }}">
                <div>
                    <h1><span class="under">食の感動・幸せを共有しよう！</span></h1>
                    <p>人気の名店やお気に入りの味を<br>シェアしましょう！</p>
                    <a href="{{ url('admin/food/create') }}" class="btn-square-so-pop">投 稿</a>
                </div>
            </div>
        </div>
        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
@endsection