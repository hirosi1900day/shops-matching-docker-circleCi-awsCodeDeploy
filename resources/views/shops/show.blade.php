@extends('layouts.app')

@section('content')

    <h1>shop詳細</h1>

    
       <div class="container">
        <!--<aside class="col-sm-4">-->
            <div class="profile-photo-group">
                <div class="">
                    <h3 class="card-title">{{ $shop->user->name }}</h3>
                </div>
                <div class="">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="picture-rounded" src="{{ Gravatar::get($shop->user->email) }}" alt="">
                </div>
            </div>
        <!--</aside>-->
        <!--<div class="col-sm-8">-->
              
                <ul class="nav nav-tabs nav-justified mb-3">
                    
                      <li class="shop-information-list"><img src="/uploads/{{$shop->image_location }}" class="shop-img"></li>
                      
                      <div>店舗名</div><li class="shop-information-list">{{$shop->name}}</li>
                      <div>店舗都道府県</div><li class="shop-information-list">{{$prefecture_array[$shop->shop_location_prefecture]}}</li>
                      <div>店舗住所</div><li class="shop-information-list">{{$shop->shop_location}}</li>
                      <div>店舗使用可能時間</div><li class="shop-information-list"><{{$shop->free_time}}</li>
                      <div>店舗の種類</div><li class="shop-information-list">{{$shop_type_array[$shop->shop_type]}}</li>
                      <div>店舗紹介</div><li class="shop-information-list">{{$shop->shop_introduce}}</li>
                      <input type="hidden" id="address" value="{{$prefecture_array[$shop->shop_location_prefecture]}}{{$shop->shop_location}}">
                      <input type="hidden" id="shop-name" value="店舗名:{{$shop->name}}住所:{{$shop->shop_location}}">
                      <button id="search">マップを表示する</button>
                      <div>
                          <div id="target"></div>
                      </div>
                          
                </ul>
                     <a href="{{route('chat.show',['id'=>$shop->user->id])}}">
                         <span class="button">メッセージへ</span>
        　            </a>
                
                
            
           
             
           
        <!--</div>-->
    </div>
              
    
    <script src="{{ secure_asset('/js/google-map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBnBE1Os7I9iYTfLnsTBjT9tWvxhXzCe94&callback=initMap" async defer></script>
        
   

@endsection