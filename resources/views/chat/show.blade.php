@extends('layouts.app')

@section('content')

<div class="chatPage">
  
  <div class="container">
    <div>
    @foreach($chat_messages as $message)
    <div>
      @if($message->user_id = Auth::id())
        <span>{{Auth::user()->name}}</span>
      @else
        <span>{{$chat_room_user_name}}</span>
      @endif
      
      <div>
        <div>
        {{$message->message}}
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
   {!! Form::open(['route' => ['chat.store', $chat_room_id], 'method' => 'post']) !!}

                <div class="form-group">
                    {!! Form::label('message', 'メッセージ:') !!}
                    {!! Form::text('message', null, ['class' => 'form-control']) !!}
                    {!! Form::hidden('chat_room_user', '$chat_room_user') !!}
                </div>

    {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}

</div>



@endsection