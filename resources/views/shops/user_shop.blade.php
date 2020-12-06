@extends('layouts.app')

@section('content')

    <h1>Myshop一覧</h1>

    @if (count($shops) > 0)
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
              @foreach ($shops as $index=>$shop)
                <ul class="nav nav-tabs nav-justified mb-3">
                <li><img src="{{$shop_images[$index]}}" width="500" height="600"></li>
                <li><input type="text" value="{{$shop->name}}" readonly></li>
                <li><input type="text" value="{{$shop->shop_location_prefecture}}" readonly></li>
                <li><input type="text" value="{{$shop->shop_location}}" readonly></li>
                <li><input type="text" value="{{$shop->free_time}}" readonly></li>
                <li><input type="text" value="{{$shop->shop_type}}" readonly></li>
                <li><input type="textarea" value="{{$shop->shop_introduce}}" readonly></li>
                </ul>
            <a href="{{route('shops.edit',['shop'=>$shop->id])}}">
                 <i class="fas fa-edit fa-2x"></i>
                 <span>店舗情報変更</span>
            </a>
            {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
              @endforeach
            
           
        </div>
    </div>
              
            
    @endif

@endsection