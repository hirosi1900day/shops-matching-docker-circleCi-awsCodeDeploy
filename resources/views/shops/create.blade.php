@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'shops.store','enctype'=>'multipart/form-data']) !!}
    <div class='form-group'>
        {!! Form::label('name', '店舗名') !!}
        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('shop_location_prefecture', '都道府県') !!}
        {!! Form::select('shop_location_prefecture',config('const.prefecture_array'),0,['class'=>'form-control']) !!}
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
        {!! Form::label('shop_type', '店舗ジャンル') !!}
        {!! Form::select('shop_type',config('const.shop_type_array'),0,['class'=>'form-control']) !!}
    <div>
    <div class='form-group'>
        {!! Form::label('image_location','店舗写真') !!}
        {!! Form::file('image_location') !!}
    </div>
    <div class='form-group'>
       {!! Form::label('shop_introduce', '店舗紹介') !!}
       {!! Form::textarea('shop_introduce',old('shop_introduce'),['class'=>'form-control']) !!}
    </div>
       {!! Form::submit('登録する',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
    </div>

@endsection