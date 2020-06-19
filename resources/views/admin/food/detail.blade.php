@extends('layouts.top')
@section('title', '投稿店舗一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 box1">
                <img src="{{ asset('storage/image/' . $food->image_path) }}" width="370" height="280">
            </div>
            <div class="col-md-7 box25 box1">
                <h1>店名: {{ str_limit($food->shopname, 70) }}</h1>
                <h2>住所: {{ str_limit($food->address, 70) }}</h2>
                @if ($food->link1 != NULL)
                    <a href="{{ url($food->link1, 150) }}">食べログ→GO<br></a>
                @endif
                @if ($food->link2 != NULL)
                    <a href="{{ url($food->link2, 150) }}">Twitter→GO</a>
                @endif
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
        </div>
        <div class="row">
            <div class="col-md-7">
                <div style="width: 620px; height: 310px; margin-top: 10px; margin-bottom: 40px; border: 1px dotted #333333; border-radius: 5px;">
                    <p>コメント:<br>{{ str_limit($food->comment, 350) }}</p>
                </div>
            </div>
            <div class="col-md-5">
                @if ($food->map != NULL)
                    <iframe src="{{ url($food->map, 200) }}" width="350" height="320" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                @endif
            </div>
        </div>
    </div>
@endsection