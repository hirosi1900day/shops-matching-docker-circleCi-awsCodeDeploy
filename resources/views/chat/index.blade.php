@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     <h1>チャットユーザー一覧</h1>
      @foreach($chat_room_names as $index=>$chat_room_name)
         <a href="{{route('chat.show',['id'=>$room_user_id[$index][1]])}}">
         <div class="text">{{$chat_room_name}}</div>
         </a>
     @endforeach
 </div> 
    
@endsection