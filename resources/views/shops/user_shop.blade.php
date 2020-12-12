@extends('layouts.app')

@section('content')
<div class="background-skyblue">

    <h1>Myshop</h1>

    @if (count($shops) > 0)
       <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                   <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid user-profile-image" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                   </div>
                </div>
            </aside>
        <div class="col-sm-8">
            @foreach ($shops as $index=>$shop)
                <div>店舗写真</div>
            　　<div><img src="{{$shop_images[$index]}}" class="shop-image"></div>
                <div>店舗名</div>
                <div class="text">{{$shop->name}}</div>
                <div>店舗都道府県</div>
                <div class="text">{{$shop->shop_location_prefecture}}</div>
                <div>店舗住所</div>
                <div class="text">{{$shop->shop_location}}</div>
                <div>店舗空き時間</div>
                <div class="text">{{$shop->free_time}}</div>
                <div>店舗種類</div>
                <div class="text">{{$shop->shop_type}}</div>
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