@extends('layouts.app')

@section('content')

@include('loading')

<div class="background-skyblue">
    <h1>shop一覧</h1>
  <div>
    {!! Form::open(['route'=>'shops.narrow_down']) !!}
   
    <div class='form-group'>
        {!! Form::label('prefecture_id', '都道府県') !!}
        {!! Form::select('prefecture_id',['選択してください','北海道','青森','岩手','宮城','秋田','山形','福島',
        '茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜',
        '静岡','愛知','三重','滋賀','京都','大阪','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島',
        '香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄',],0,['class'=>'form-control']) !!}
    </div>
    
    <div class='form-group'>
        {!! Form::label('shop_type_id', '店舗ジャンル') !!}
        {!! Form::select('shop_type',['選択してください','居酒屋','カフェ',
        '事務所','その他',],0,['class'=>'form-control']) !!}
    <div>
   
       {!! Form::submit('絞り込む',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
    </div>
   
    @if (count($shops) > 0)
     @foreach ($shops as $index=>$shop)
       <div class="row shops-index-container shadow">
            <aside class="col-sm-2 margin">
                
                    <div>
                        <div>
                            <h3 class="center">{{ $shop->user->name }}</h3>
                        </div>
                        <div class="center">
                            @if($shop->user->profile_image_location=='')
                                <img class="user-profile-image" src="{{ Gravatar::get($shop->user->email) }}" alt="">
                            @else
                                <img class="user-profile-image" src="{{Storage::disk('s3')->url($shop->user->profile_image_location)}}" alt="">
                            @endif
                       </div>
                    </div>
                    
               
            </aside>
           <div class="col-sm-10">
             
                
                <div class="center"><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image shadow"></div>
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
                
               @if (Auth::user()->is_favorite($shop->id))
                {{-- unfavoriteボタンのフォーム --}}
                {!! Form::open(['route' => ['favorites.unfavorite','id'=> $shop->id], 'method' => 'delete']) !!}
                {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
                {!! Form::close() !!}
                @else
                {{-- favoriteボタンのフォーム --}}
                {!! Form::open(['route' => ['favorites.favorite', 'id'=>$shop->id]]) !!}
                {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
                {!! Form::close() !!}
                @endif
                @endif
           
            </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif

</div>
    

@endsection