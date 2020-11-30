@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li><input type="text" value="{{$user->name}}" readonly></li>
                <li><input type="textarea" value="{{$user->self_introduce}}" readonly></li>
            </ul>
            <a href="{{route('users.edit',['user'=>$user->id])}}">
                 <i class="fas fa-edit fa-2x"></i>
                 <span>情報を編集</span>
            </a>
           
        </div>
    </div>
@endsection