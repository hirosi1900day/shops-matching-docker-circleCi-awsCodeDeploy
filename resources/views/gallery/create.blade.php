@extends('layouts.app')

@section('content')

    <h1>写真追加ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::open(['route' => 'messages.store','enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('image_location', '写真を追加:') !!}
                    {!! Form::file('image_location', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('写真を追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection