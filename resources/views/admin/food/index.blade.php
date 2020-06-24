@extends('layouts.top')
@section('title', '投稿店舗一覧')

@section('content')
    <div class="container">
        <div class="row index_title">
            <h2>店舗一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\FoodController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-shop col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">写真</th>
                                <th width="20%">情報</th>
                                <th width="40%">コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $food)
                                <tr>
                                    <th><img src="{{ $food->image_path }}" height="280px"></th>
                                    <td>◇店名◇<br>{{ \Str::limit($food->shopname, 100) }}<br><br>◇住所◇<br>{{ \Str::limit($food->address, 100) }}</td>
                                    <td>{{ \Str::limit($food->comment, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\FoodController@detail', ['id' => $food->id]) }}">詳細</a>
                                            @if(Auth::id() == $food->user_id)
                                                <a href="{{ action('Admin\FoodController@edit', ['id' => $food->id]) }}">編集</a>
                                                <a href="{{ action('Admin\FoodController@delete', ['id' => $food->id]) }}">削除</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection