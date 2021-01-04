@extends('layouts.app')

@section('content')

@foreach($recruits as $recruit)
    <div class="shops-index-container shadow">
        <div class="text"><div class="text-title">募集タイトル</div>{{$recruit->title}}</div>
        <div class="text"><div class="text-title">募集内容</div>{{$recruit->content}}</div>
        @if(($recruit->user->id)==(Auth::id()))
        <a href="{{route('recruit.match_index',['id'=>$recruit->id])}}" class="button text-decoration-none">
            <span>募集応募したショップを見る</span>
        </a>
        @endif
    </div>
@endforeach
@endsection