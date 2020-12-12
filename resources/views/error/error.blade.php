@extends('layouts.app')

@section('content')
        
		<p class="alert alert-danger error_content" role="alert">{{$error}}</p>
		<a href="{{route('shops.index')}}">
            <span class="button">ホームへ</span>
        </a>
@endsection