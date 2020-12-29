@extends('layouts.app')

@section('content')

@foreach($recruits as $recruit)
<div>{{$recruit->title}}</div>
<div>{{$recruit->content}}</div>
<a href="{{route('recruit.match_index',['id'=>$recruit->id])}}" class="button">
    <span>募集への反応</span>
</a>
@endforeach
@endsection