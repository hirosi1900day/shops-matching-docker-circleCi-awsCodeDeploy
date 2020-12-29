@extends('layouts.app')

@section('content')

@foreach($shops[0] as $shop)

<div>{{$shop->name}}</div>
@endforeach
@endsection