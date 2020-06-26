@extends('layouts.top')
@section('title', '投稿店舗一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 detail_title">
                <h1> {{ str_limit($food->shopname, 70) }}</h1>
            </div>
        </div>
        <div class="row">
            @if (Auth::id() != $food->user_id)
                @if (Auth::user()->is_favorite($food->id))
                    {!! Form::open(['route' => ['favorites.unfavorite', $food->id], 'method' => 'delete']) !!}
                        {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['favorites.favorite', $food->id]]) !!}
                        {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
                    {!! Form::close() !!}
                @endif
            @endif
            <div class="mb-2">いいね！
                <span class="badge badge-pill badge-success">{{ $count_favorite_users }}</span>
            </div>
        </div>
        <div class="row top_img">    
            <img src="{{ $food->image_path }}" width="600vw" height="500vw">
        </div>
        <div class="row detail">
            <h2>店舗情報</h2>
        </div>
        <div class="row">
            <table class="detail_table">
                <tr>
                    <th>住所</th><td>{{ str_limit($food->address, 70) }}</td>
                </tr>
                <tr>
                    <th>MAP</th>
                    <td>
                        @if ($food->map != NULL)
                            <iframe src="https://maps.google.co.jp/maps?output=embed&q={{ $food->address }}" width="550" height="220"></iframe>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>リンク</th>
                    <td>
                        @if ($food->link1 != NULL)
                            <a href="{{ url($food->link1, 150) }}">食べログ→GO<br></a>
                        @endif
                        @if ($food->link2 != NULL)
                            <a href="{{ url($food->link2, 150) }}">Twitter→GO</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>コメント</th><td>{{ str_limit($food->comment, 350) }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection