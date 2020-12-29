@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>編集ページ</h1>
    {!! Form::model($shop,['route'=>['shops.update',$shop->id],'enctype'=>'multipart/form-data','method'=>'put']) !!}
    <div class='form-group'>
        {!! Form::label('name', '店舗名') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('shop_location_prefecture', '都道府県') !!}
        {!! Form::select('shop_location_prefecture',['選択してください','北海道','青森','岩手','宮城','秋田','山形','福島',
        '茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜',
        '静岡','愛知','三重','滋賀','京都','大阪','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島',
        '香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄',],0,['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('shop_location', '店舗住所') !!}
        {!! Form::text('shop_location',old('shop_location'),['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('free_time', '店舗貸し出し可能時間') !!}
        {!! Form::text('free_time',old('free_time'),['class'=>'form-control']) !!}
    </div>
     <div class='form-group'>
        {!! Form::label('tag', 'タグの追加(上書き）') !!}
        {!! Form::text('tag',old('#の形で表示'),['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('shop_type', '店舗ジャンル') !!}
        {!! Form::select('shop_type',['選択してください','居酒屋','カフェ',
        '事務所','その他',],0,['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('image_location','店舗写真') !!}
        {!! Form::file('image_location') !!}
    </div>
    <div class='form-group'>
        {!! Form::label('shop_introduce', '店舗紹介') !!}
        {!! Form::textarea('shop_introduce',old('shop_introduce'),['class'=>'form-control']) !!}
    </div>
        {!! Form::submit('更新する',['class'=>'btn btn-info']) !!}
        {!! Form::close() !!}  
</div>

@endsection