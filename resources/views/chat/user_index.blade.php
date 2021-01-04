@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     @if(count($chat_rooms)>0)
         <h1>チャットユーザー一覧</h1>
         @foreach($chat_rooms as $index=>$chat_room)
           <div class="row list">
                 <div class="col-2">
                     <div class="center">
                         @if($shops[$index]->user->profile_image_location=='')
                             <img class="user-profile-image center" src="{{ secure_asset('/img/welcom-main-photo/human2.png') }}" alt="">
                         @else
                             <img class="list-profile-image" src="{{Storage::disk('s3')->url($shops[$index]->user()->first()->profile_image_location)}}" alt="">
                         @endif
                      </div>
                  </div> 
                  <div class="col-10 list-height">
                      <a href="{{route('chat.view',['id'=>$chat_room->id])}}" class="text-decoration-none">
                          <div class="list-fontsize">{{$shops[$index]->name}}</div>
                      </a>
                  </div>
             </div>
         @endforeach
     @else
         <h1>チャットユーザーがいません</h1>
     @endif
 </div> 
@endsection