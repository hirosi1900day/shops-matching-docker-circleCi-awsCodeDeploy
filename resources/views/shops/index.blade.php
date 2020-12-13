@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>shop一覧</h1>
 

    @if (count($shops) > 0)
     @foreach ($shops as $index=>$shop)
       <div class="row shops-index-container">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $shop->user->name }}</h3>
                    </div>
                    <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid shops-index-image" src="{{ Gravatar::get($shop->user->email) }}" alt="">
                    </div>
                </div>
            </aside>
           <div class="col-sm-8">
             
                
                <div><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image"></div>
                <div>店舗名</div><div class="text">{{$shop->name}}</div>
                <div>都道府県</div><div class="text">{{$prefecture_array[$shop->shop_location_prefecture]}}</div>
                <div>貸出可能時間</div><div class="text">{{$shop->free_time}}</div>
                <div>店舗の種類</div><div class="text">{{ $shop_type_array[$shop->shop_type]}}</div>
                <!--@php-->
                <!--dd($shop->user_id);-->
                <!--@endphp-->
                @if($shop->user_id!=Auth::user()->id)
                
                <a href="{{route('shops.show',['shop'=>$shop->id])}}" class="button">
                
                    <span>店舗情報詳細へ</span>
                </a>
                @endif
           
             
           
            </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif

</div>
    
@endsection