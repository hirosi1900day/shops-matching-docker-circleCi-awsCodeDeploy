@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     
     @if(count($shops)>0)
         <h1>お気に入り店舗</h1>
         @foreach($shops as $shop)
             <a href="{{route('shops.show',['shop'=>$shop->id])}}">
                 <div class="text">{{$shop->name}}</div>
             </a>
         @endforeach
     @else
         <h1>お気に入り店舗がありません</h1>
     @endif
 </div> 
@endsection