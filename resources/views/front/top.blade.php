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
        <div class="top_second">
            <h2>新メニュー登場！！</h2>
            <hr>
            <!--カラムを中央寄せにしてます。-->
            <div class="row new_topic justify-content-center">
                <div class="col-md-2">
                    <img src="{{ asset('img/ramen1.jpg') }}" width="400vw" height="330vw">
                </div>
                <div class="col-md-3 new_topic_text">
                    <h3><span class="under2">厚木家/ネギチャーシュー麺</span></h3>
                    <p>歯応えの良いネギが濃厚な家系スープと相性抜群！<br>細切りにされたチャーシューもボリューム満点に入ってます！</p>
                </div>
            </div>
        </div>
        <!--仕切りの線を記載してます。-->
        <div class="separate">
            <hr>
        </div>
        <div class="row new_topic justify-content-center">
            <div class="col-md-2">
                <img src="{{ asset('img/motosuke.don.jpg') }}" width="400vw" height="330vw">
            </div>
            <div class="col-md-3 new_topic_text">
                <h3><span class="under2">めん屋元助/チャーシュー丼</span></h3>
                <p>口の中でホロホロとほぐれる柔らかチャーシューでご飯が進む！<br>腹ぺこの際には是非ラーメンのお供に！</p>
            </div>
        </div>
    </div>
@endsection