@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            
               
                {!! Form::model($user, ['route' => ['users.update','user'=>$user->id],"method"=>"put"]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('self_introduce', 'introduce:') !!}
                    {!! Form::text('self_introduce', null, ['class' => 'form-control']) !!}
                </div>


                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            
          </div>
            
                
           
        </div>
    </div>
@endsection