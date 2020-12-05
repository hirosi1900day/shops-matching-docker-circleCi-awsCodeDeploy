@extends('layouts.app')

@section('content')

    <h1>shop詳細</h1>

    
       <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $shop->user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($shop->user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
              
                <ul class="nav nav-tabs nav-justified mb-3">
                     <li><img src="/uploads/{{ $shop->image_location }}"></li>
                     <li>{{$shop->name}}</li>
                     <li>{{$shop->shop_location_prefecture}}</li>
                     <li>{{$shop->shop_location}}</li>
                     <li><{{$shop->free_time}}</li>
                     <li>{{$shop->shop_type}}</li>
                     <li>{{$shop->shop_introduce}}</li>
                </ul>
                <a href="{{route('chat.show',['id'=>$shop->user->id])}}">
                    <buttom>メッセージへ</buttom>
        　　　　</a>
                
                
            
           
             
           
        </div>
    </div>
              
            
   

@endsection