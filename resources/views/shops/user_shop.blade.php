@extends('layouts.app')

@section('content')
<div class="background-skyblue">

    <h1>Myshop一覧</h1>

    @if (count($shops) > 0)
       <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }}</h3>
                    </div>
                   <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                   </div>
                </div>
            </aside>
        <div class="col-sm-8">
            @foreach ($shops as $index=>$shop)
                
                <div><img src="{{$shop_images[$index]}}" class="shop-image"></div>
                <div class="text">{{$shop->name}}</div>
                <div class="text">{{$shop->shop_location_prefecture}}</div>
                <div class="text">{{$shop->shop_location}}</div>
                <div class="text">{{$shop->free_time}}</div>
                <div class="text">{{$shop->shop_type}}</div>
                <div class="text">{{$shop->shop_introduce}}</div>
                
            <a href="{{route('shops.edit',['shop'=>$shop->id])}}" class="button">
                <i class="fas fa-edit fa-2x"></i>
                <span>店舗情報変更</span>
            </a>
            <div>
               {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
               {!! Form::submit('削除', ['class' => 'button-delete']) !!}
               {!! Form::close() !!} 
            </div>
            
             @endforeach
            
           
        </div>
    </div>
              
</div>            
    @endif

@endsection