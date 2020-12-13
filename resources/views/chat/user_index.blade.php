@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     
     @if(count($chat_rooms)>0)
         <h1>チャットユーザー一覧</h1>
         
         @foreach($chat_rooms as $index=>$chat_room)
           
           
             <a href="{{route('chat.show',['id'=>$chat_room->id])}}">
              <div class="text">{{$shops[$index]->name}}</div>
             </a>
            
            
         @endforeach
     @else
         <h1>チャットユーザーがいません</h1>
     @endif
 </div> 
    
@endsection