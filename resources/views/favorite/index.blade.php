@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     
     @if(count($shops)>0)
         <h1>お気に入り店舗</h1>
         @foreach($shops as $shop)
             <div class="row list">
                 <div class="col-2">
                     <div class="center">
                         @if($shop->user->profile_image_location=='')
                             <img class="list-profile-image" src="{{ Gravatar::get($shop->user()->first()->email) }}" alt="">
                         @else
                             <img class="list-profile-image" src="{{Storage::disk('s3')->url($shop->user()->first()->profile_image_location)}}" alt="">
                         @endif
                      </div>
                  </div> 
                  <div class="col-10 list-height">
                      <a class="" href="{{route('shops.show',['shop'=>$shop->id])}}">
                          <div class="list-fontsize">{{$shop->name}}</div>
                      </a>
                  </div>
             </div>
            
             
         @endforeach
     @else
         <h1>お気に入り店舗がありません</h1>
     @endif
 </div> 
@endsection