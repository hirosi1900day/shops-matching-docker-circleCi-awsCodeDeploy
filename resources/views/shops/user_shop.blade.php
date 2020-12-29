@extends('layouts.app')

@section('content')
<div class="background-skyblue">

    <h1>Myshop</h1>

    @if (count($shops) > 0)
       <div class="row">
            <aside class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}} 
                        @if($user->profile_image_location=='')
                        <img class="user-profile-image" src="{{ Gravatar::get($user->email) }}" alt=""> 　　
                        @else
                        <img class="user-profile-image" src="{{Storage::disk('s3')->url($user->profile_image_location)}}" alt="">
                        @endif
                        <div>
                            <div class="text-title">自己紹介</div>
                            <div class="text">{{$user->self_introduce}}</div>
                        </div>
                    </div>
                </div>
            </aside>
        <div class="col-sm-9">
            @foreach ($shops as $shop)
                <div class="shops-index-container shadow">
                    <div class="text-title">店舗写真</div>
            　     　<div class="center"><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shop-image"></div>
                    <div class="text-title">店舗名</div>
                    <div class="text">{{$shop->name}}</div>
                    <div class="text-title">店舗都道府県</div>
                    <div class="text">{{$prefecture_array[$shop->shop_location_prefecture]}}</div>
                    <div class="text-title">店舗住所</div>
                    <div class="text">{{$shop->shop_location}}</div>
                    <div class="text-title">店舗空き時間</div>
                    <div class="text">{{$shop->free_time}}</div>
                    <div class="text-title">店舗種類</div>
                    <div class="text">{{$shop_type_array[$shop->shop_type]}}</div>
                    <div class="text-title">店舗紹介</div>
                    <div class="text">{{$shop->shop_introduce}}</div>
                    <div class="text-title">タグ</div>
                    @foreach($shop->tags()->get() as $shop_tag)
                    <div class="text">{{$shop_tag->name}}</div>
                    @endforeach
                <div class="flex">
                   <a href="{{route('shops.edit',['shop'=>$shop->id])}}" class="button">
                       <span class="button-text">店舗情報変更</span>
                   </a>
                   <a href="{{route('gallery.showGallerys',['id'=>$shop->id])}}" class="button">
                       <span class="button-text">写真ギャラリー</span>
                   </a>
                   <a href="{{route('chat.shop_index',['id'=>$shop->id])}}" class="button">
                       <span class="button-text">取引ユーザー一覧</span>
                   </a>
               
                 
                   {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                   {!! Form::submit('削除', ['class' => 'button-delete']) !!}
                   {!! Form::close() !!}
                </div>  
            </div>
             @endforeach
            
           
        </div>
    </div>
    @else
    <h2>店舗がありません</h2>
</div>            
    @endif

@endsection