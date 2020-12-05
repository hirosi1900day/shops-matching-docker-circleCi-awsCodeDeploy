@extends('layouts.app')

@section('content')

    <h1>shop一覧</h1>

    @if (count($shops) > 0)
     @foreach ($shops as $shop)
       <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $shop->user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($shop->user->email, ['size' => 50]) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
              
                <ul class="nav nav-tabs nav-justified mb-3">
                <li><img src="/uploads/{{ $shop->image_location }}" width="500" height="600"></li>
                <li>{{$shop->name}}</li>
                <li>{{$shop->shop_location_prefecture}}</li>
                <li><{{$shop->free_time}}</li>
                <li>{{$shop->shop_type}}</li>
                </ul>
                <a href="{{route('shops.show',['shop'=>$shop->id])}}">
                
                 <button>店舗情報詳細へ</button>
                </a>
            
           
             
           
        </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif

@endsection