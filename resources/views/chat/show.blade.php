@extends('layouts.app')

@section('content')

<div class="chatPage">
  
    <div class="container">
        <ul class="messages">
        @foreach($chat_messages as $message)
               
                @if($message->user_id = Auth::id())
                    <li class="right-side">
                        <span>{{Auth::user()->name}}</span>
                        <div class="pic">
                            <img src="{{ secure_asset('/img/gallery-thumbnail/kitten1.jpg')}}">
                        </div>
                        <div class="chat_text">
                            {{$message->message}}
                        </div>
                    </li>
                     
                @else
                   <li class="left-side">
                   <span>{{$chat_room_user_name}}</span>
                   <div class="pic">
                           <img src="{{ secure_asset('/img/gallery-thumbnail/kitten1.jpg')}}">
                   </div>
                   <div class-"chat_text">
                       {{$message->message}}
                   </div>
                   </li>
                @endif

        @endforeach
        </ul>
    </div>
</div>
  
　{!! Form::open(['route' => ['chat.store', $chat_room_id], 'method' => 'post']) !!}

                <div class="form-group">
                    
                    {!! Form::text('message', null, ['class' => 'form-control', 'placeholder'=>'messege']) !!}
                    {!! Form::hidden('userId', $chat_room_user->id) !!}
                </div>

  {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}
   <a href="{{route('chat.message_redirect',['id'=>$chat_room_user->id])}}" class="button">
                <span>メッセージ更新</span>
                </a>
  {{ $chat_messages->links() }}
@endsection
