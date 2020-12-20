@extends('layouts.app')

@section('content')
<div class="background-skyblue">

    <h1>Myshop</h1>

    @if (count($shops) > 0)
       <div class="row">
            <aside class="col-sm-3">
                <div>
                    <div class="center">
                        <h3>{{ $user->name }}</h3>
                    </div>
                    <div class="center">
                         @if($user->profile_image_location=='')
                             <img class="user-profile-image" src="{{ Gravatar::get($user->email) }}" alt="">
                         @else
                             <img class="user-profile-image" src="{{Storage::disk('s3')->url($user->profile_image_location)}}" alt="">
                    　　@endif
                        
                    </div>
                </div>
            </aside>
        <div class="col-sm-9">
            @foreach ($shops as $shop)
                <div>店舗写真</div>
            　　<div class="center"><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shop-image"></div>
                <div>店舗名</div>
                <div class="text">{{$shop->name}}</div>
                <div>店舗都道府県</div>
                <div class="text">{{$prefecture_array[$shop->shop_location_prefecture]}}</div>
                <div>店舗住所</div>
                <div class="text">{{$shop->shop_location}}</div>
                <div>店舗空き時間</div>
                <div class="text">{{$shop->free_time}}</div>
                <div>店舗種類</div>
                <div class="text">{{$shop_type_array[$shop->shop_type]}}</div>
                <div>店舗紹介</div>
                <div class="text">{{$shop->shop_introduce}}</div>
            <div class="flex">
                <a href="{{route('shops.edit',['shop'=>$shop->id])}}" class="button">
                   <i class="fas fa-edit fa-2x"></i>
                   <span>店舗情報変更</span>
               </a>
               <a href="{{route('gallery.showGallerys',['id'=>$shop->id])}}" class="button">
                   <i class="fas fa-edit fa-2x"></i>
                   <span>写真ギャラリー</span>
               </a>
               <a href="{{route('chat.shop_index',['id'=>$shop->id])}}" class="button">
                   <i class="fas fa-edit fa-2x"></i>
                   <span>取引ユーザー一覧</span>
               </a>
               <!--<a href="{{route('shops.destroy',['shop'=>$shop->id])}}" class="button-delete">-->
                 
               <!--    <span>削除</span>-->
               <!--</a>-->
               {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
               {!! Form::submit('削除', ['class' => 'button-delete']) !!}
               {!! Form::close() !!}
            </div>  
           
             @endforeach
            
           
        </div>
    </div>
    @else
    <h2>店舗がありません</h2>
</div>            
    @endif

@endsection