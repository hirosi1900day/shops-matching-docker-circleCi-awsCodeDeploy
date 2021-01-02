@extends('layouts.app')

@section('content')

@if(count($shops)>0)
    @foreach($shops[0] as $shop)
    <div class="shops-index-container shadow">
         <div class="grid-shop-index">
            <div><img src="{{Storage::disk('s3')->url($shop->image_location)}}" class="shops-index-image shadow"></div>
            <div>
                <div class="form-name">店舗名</div><div class="text">{{$shop->name}}</div>
                <div class="form-name">都道府県</div><div class="text">{{config('const.prefecture_array')[$shop->shop_location_prefecture]}}</div>
                <div class="form-name">貸出可能時間</div><div class="text">{{$shop->free_time}}</div>
                <div class="form-name">店舗の種類</div><div class="text">{{ config('const.prefecture_array')[$shop->shop_type]}}</div>
                @if($shop->user_id!=Auth::user()->id)
                    <div class="flex-favorite">
                        <a href="{{route('shops.show',['shop'=>$shop->id])}}" class="button">
                            <span>店舗情報詳細へ</span>
                        </a>
                        <like :shop-id="{{$shop->id}}" class="favorite"></like>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@else
    <p>ありません</p>
@endif
@endsection