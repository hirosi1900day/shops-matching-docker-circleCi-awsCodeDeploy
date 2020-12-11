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
                        <h3 class="card-title">{{ $gallery->shop()->first()->user->name }}</h3>
                    </div>
                    <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid shops-index-image" src="{{ Gravatar::get($gallery->shop()->first()->user->email) }}" alt="">
                    </div>
                </div>
            </aside>
           <div class="col-sm-8">
             
                
                <div><img src="{{$gallery_images[$index]}}" class="shops-index-image"></div>
                
                
                <a href="{{route('gallery.destroy',['id'=>$gallery->id])}}" class="button">
                <span>削除</span>
                </a>
                
            
           
             
           
            </div>
    </div>
              
    @endforeach  
    @else
    <div>店舗がありません</div>
    @endif
    <a href="{{route('gallery.create')}}" class="button">
        <span>作成</span>
    </a>
</div>
    
@endsection
           