@extends('layouts.app')

@section('content')
     @foreach($chat_room_names as $chat_room_name)
         <div>{{$chat_room_name}}</div>
     @endforeach
@endsection