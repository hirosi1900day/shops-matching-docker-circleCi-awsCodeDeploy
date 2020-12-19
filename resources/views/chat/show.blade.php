@extends('layouts.app')

@section('content')
<h1>{{$shop->name}}</h1>
@if(count($messages)>0)

<div class="chatPage background-skyblue">
 
    <div class="container">
        <ul class="messages">
        @foreach($messages as $index=>$message)
               
                @if($message->user_id == Auth::id())
                    <li class="right-side">
                        <a class="chat_user_name" href="{{route('users.show',['user'=>$message->user_id])}}">
                            <span>{{Auth::user()->name}}</span>
                            <div class="pic">
                               @if(Auth::user()->profile_image_location=='')
                                   <img src="{{ Gravatar::get(Auth::user()->email) }}" alt="">
                               @else
                                   <img src="{{Storage::disk('s3')->url(Auth::user()->profile_image_location)}}" alt="">
                               @endif
                            </div>
                        </a>
                        <div class="chat_text">
                            {{$message->message}}
                        </div>
                    </li>
                     
                @else
                   <li class="left-side">
                   <a class="chat_user_name" href="{{route('users.show',['user'=>$users[$index]->id])}}">
                       <span>{{$users[$index]->name}}</span>
                       <div class="pic">
                           @if($users[$index]->profile_image_location=='')
                                <img src="{{ Gravatar::get($users[$index]->email) }}" alt="">
                           @else  
                                <img src="{{Storage::disk('s3')->url($users[$index]->profile_image_location)}}" alt="">
                           @endif
                       </div>
                   </a>
                   <div class="chat_text">
                       {{$message->message}}
                   </div>
                   </li>
                @endif

        @endforeach
        </ul>
    </div>

  @else
  <h1>メッセージがありません</h1>
  @endif
 
{!! Form::open(['route' => ['chat.store', 'id'=>$chatroom->id], 'method' => 'post']) !!}

                <div class="form-group">
                    
                    {!! Form::text('message', null, ['class' => 'form-control', 'placeholder'=>'messege']) !!}
                    {!! Form::hidden('user_id', Auth::id()) !!}
                    {!! Form::hidden('shop_id', $chatroom->first()->shop_id) !!}
                    
                </div>

  {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}

  <a href="{{route('chat.message_redirect',['id'=>$chatroom->id])}}" class="button">
                <span>メッセージ更新</span>
  </a>
</div>  




@endsection
