@extends('layouts.app')

@section('content')

    <h1>写真追加ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::open(['route' => ['gallery.store',$shop->id],'enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('image_location', '写真を追加:') !!}
                    {!! Form::file('image_location', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('写真を追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    
@endsection