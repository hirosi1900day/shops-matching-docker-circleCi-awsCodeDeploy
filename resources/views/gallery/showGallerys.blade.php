@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>ギャラリー一覧</h1>

    @if (count($gallerys) > 0)
     @foreach ($gallerys as $index=>$gallery)
       <div class="row shops-index-container">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $gallery->shop()->user->name }}</h3>
                    </div>
                    <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid shops-index-image" src="{{ Gravatar::get($gallery->shop()->user->email) }}" alt="">
                    </div>
                </div>
            </aside>
           <div class="col-sm-8">
             
                
                <div><img src="{{$gallery_images[$index]}}" class="shops-index-image"></div>
                
                
                <a href="{{route('gallery.delete',['id'=>$gallery->id])}}" class="button">
                <span>削除</span>
                </a>
                <a href="{{route('gallery.create')}}" class="button">
                <span>作成</span>
                </a>
            
           
             
           
            </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif

</div>
    
@endsection
            </aside>
           <div class="col-sm-8">
             
                
                <div><img src="{{$shop_images[$index]}}" class="shops-index-image"></div>
                <div>店舗名</div><div class="text">{{$shop->name}}</div>
                <div>都道府県</div><div class="text">{{$shop->shop_location_prefecture}}</div>
                <div>貸出可能時間</div><div class="text">{{$shop->free_time}}</div>
                <div>店舗の種類</div><div class="text">{{$shop->shop_type}}</div>
                
                <a href="{{route('shops.show',['shop'=>$shop->id])}}" class="button">
                
                 <span>店舗情報詳細へ</span>
                </a>
            
           
             
           
            </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif

</div>
    
@endsection