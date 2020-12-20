@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>ギャラリー一覧</h1>
    @if((Auth::user()->id)==($user->first()->id))
    <a href="{{route('gallery.create',['id'=>$shop->id])}}" class="button">
        <span>ギャラリー作成する</span>
    </a>
    @endif
    @if (count($gallerys) > 0)
     <div class="image-gallery animated">
        <div class="d-inline-block">
          @foreach ($gallerys as $index=>$gallery)
             <div class="image-gallery__item">
                   <img class="gallery-photo" src="{{Storage::disk('s3')->url($gallery->image_location)}}" >
             </div>    
                   @if((Auth::user()->id)==($user->first()->id))
                   <a href="{{route('gallery.destroy',['id'=>$gallery->id])}}" class="button">
                   <span>削除</span>
                   </a>
                   @endif

             
            

              
    @endforeach 

        </div>
      </div>
  
    @else
    <div>店舗がありません</div>
    @endif
    
    
</div>
    
@endsection
           