@extends('layouts.top')

@section('title', '店舗の新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto create_title">
                <h2>店舗の新規作成</h2>
                <form action="{{ action('Admin\FoodController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shopname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">住所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル</label>
                        <div class="col-md-3">
                            <select class="form-control" name="genre">
                                <option value="ラーメン">ラーメン</option>
                                <option value="中華">中華</option>
                                <option value="イタリアン">イタリアン</option>
                                <option value="和食">和食</option>
                                <option value="スイーツ">スイーツ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">食べログURL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="link1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">twitterURL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="link2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">MapURL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="map">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="15"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image"/>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection