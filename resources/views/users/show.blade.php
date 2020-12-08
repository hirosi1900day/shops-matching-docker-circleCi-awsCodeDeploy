@extends('layouts.app')

@section('content')
    <div class="container border">
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                </div>
            </div>
        </div>
        <div class="user_show_body">
            <div>
                <div class="user_show_name">{{$user->name}}</div>
                <div class="user_show_self_introduce">{{$user->self_introduce}}</div>
            </div>   
            
            <a href="{{route('users.edit',['user'=>$user->id])}}" class="button">
                 <i class="fas fa-edit fa-2x"></i>
                 <span>情報を編集</span>
            </a>
           
        </div>
    </div>
@endsection