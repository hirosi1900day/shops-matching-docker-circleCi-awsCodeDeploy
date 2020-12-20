@extends('layouts.app')

@section('content')

    <h1>shop詳細</h1>

    <div class="background-skyblue">

    <h1>Myshop</h1>

    
       <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$shop->user->name }}</h3>
                    </div>
                   <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid user-profile-image" src="{{ Gravatar::get($shop->user->email, ['size' => 500]) }}" alt="">
                   </div>
                </div>
            </aside>
        <div class="col-sm-8">
              
                
                      <div><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image"></div>
                      
                      <div>店舗名</div><div class="text">{{$shop->name}}</div>
                      <div>店舗都道府県</div><div class="text">{{$prefecture_array[$shop->shop_location_prefecture]}}</div>
                      <div>店舗住所</div><div class="text">{{$shop->shop_location}}</div>
                      <div>店舗使用可能時間</div><div class="text">{{$shop->free_time}}</div>
                      <div>店舗の種類</div><div class="text">{{$shop_type_array[$shop->shop_type]}}</div>
                      <div>店舗紹介</div><div class="text">{{$shop->shop_introduce}}</div>
                      <input type="hidden" id="address" value="{{$prefecture_array[$shop->shop_location_prefecture]}}{{$shop->shop_location}}">
                      <input type="hidden" id="shop-name" value="店舗名:{{$shop->name}}住所:{{$shop->shop_location}}">
                      <button id="search">マップを表示する</button>
                      <div>
                          <div id="target"></div>
                      </div>
                          
              
                     <a href="{{route('chat.create_chatroom',['id'=>$shop->id])}}">
                         <span class="button">メッセージへ</span>
        　            </a>
        　            <a href="{{route('gallery.showGallerys',['id'=>$shop->id])}}" class="button">
                         <span>写真ギャラリー</span>
                     </a>
                
                
            
           
             
           
        </div>
    </div>
              
    
    <script src="{{ secure_asset('/js/google-map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBnBE1Os7I9iYTfLnsTBjT9tWvxhXzCe94&callback=initMap" async defer></script>
        
   

@endsection