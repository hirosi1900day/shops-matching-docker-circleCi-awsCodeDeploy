<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'recruit.store']) !!}
    <div class='form-group'>
    
    <div class='form-group'>
        {!! Form::label('title', '募集タイトル') !!}
        {!! Form::text('title',old('title'),['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('content', '募集内容') !!}
        {!! Form::text('content',old('content'),['class'=>'form-control']) !!}
    </div>
       {!! Form::submit('登録する',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
    </div>