@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>募集作成ページ</h1>
    {!! Form::open(['route'=>'recruit.store']) !!}
        <div class='form-group'>
            {!! Form::label('title', '募集タイトル') !!}
            {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', '募集内容') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('募集する',['class'=>'btn btn-info']) !!}
    {!! Form::close() !!}   
</div>
@endsection