@extends('layouts.app')

@section('content')
    <div class="background-skyblue">
       <h1>shop詳細</h1>
       <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$shop->user->name }}</h3>
                    </div>
                    <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}} 
                        @if($shop->user->profile_image_location=='')
                            <img class="user-profile-image center" src="{{ secure_asset('/img/welcom-main-photo/human2.png') }}" alt="">
                        @else
                            <img class="user-profile-image" src="{{Storage::disk('s3')->url($shop->user->profile_image_location)}}" alt="">
                        @endif
                        <div>
                            <div class="text-title">自己紹介</div>
                            <div class="text">{!! nl2br(e($shop->user->self_introduce)) !!}</div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                <div class="shops-index-container shadow">
                    <div><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image"></div>
                    <div class="text-title">店舗名</div><div class="text">{{$shop->name}}</div>
                    <div class="text-title">店舗都道府県</div><div class="text">{{$prefecture_array[$shop->shop_location_prefecture]}}</div>
                    <div class="text-title">店舗住所</div><div class="text">{{$shop->shop_location}}</div>
                    <div class="text-title">店舗使用可能時間</div><div class="text">{{$shop->free_time}}</div>
                    <div class="text-title">店舗の種類</div><div class="text">{{$shop_type_array[$shop->shop_type]}}</div>
                    <div class="text-title">店舗紹介</div><div class="text">{!! nl2br(e($shop->shop_introduce)) !!}</div>
                    <input type="hidden" id="address" value="{{$prefecture_array[$shop->shop_location_prefecture]}}{{$shop->shop_location}}">
                    <input type="hidden" id="shop-name" value="店舗名:{{$shop->name}}住所:{{$shop->shop_location}}">
                    <button id="search" class="button">マップを表示する</button>
                    <div>
                        <div id="target"></div>
                    </div>
                    <a href="{{route('chat.create_chatroom',['id'=>$shop->id])}}"class="button text-decoration-none" >
                        <span class="button">メッセージへ</span>
                    </a>
                    <a href="{{route('gallery.showGallerys',['id'=>$shop->id])}}"class="button text-decoration-none" >
                        <span class="button">ギャラリへ</span>
                    </a>
                </div>
            </div>
       </div>
    </div>
    <script src="{{ secure_asset('/js/google-map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBnBE1Os7I9iYTfLnsTBjT9tWvxhXzCe94&callback=initMap" async defer></script>
@endsection