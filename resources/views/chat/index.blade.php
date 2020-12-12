@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     
     @if(count($current_user_rooms)>0)
         <h1>チャットユーザー一覧</h1>
         
         @foreach($current_user_rooms as $index=>$current_user_room)
            @php
          dd($current_user_room)
         @endphp
           
             <a href="{{route('chat.show',['id'=>$current_user_room->id])}}">
              <div class="text">{{$current_user_room->name}}</div>
             </a>
            
            
         @endforeach
     @else
         <h1>チャットユーザーがいません</h1>
     @endif
 </div> 
    
@endsection