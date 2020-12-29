@extends('layouts.app')

@section('content')

@foreach($recruits as $recruit)
<div>{{$recruit->title}}</div>
<div>{{$recruit->content}}</div>
@if($recruit->user_id!=Auth::user()->id)
@if (Auth::user()->is_recruiting($recruit->id))
    {{-- unfavoriteボタンのフォーム --}}
    {!! Form::open(['route' => ['recruit.match_delete','id'=> $recruit->id], 'method' => 'delete']) !!}
    {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
                
@else
    {{-- favoriteボタンのフォーム --}}
    {!! Form::open(['route' => ['recruit.match', 'id'=>$recruit->id]]) !!}
    {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif
@endif
@endforeach

@endsection