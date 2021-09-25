@extends('layouts.app')

@section('content')
    <div class="center jumbotron bg-transparent mb-0 pb-4">
        <div class="text-center">
            <h1>ME-KI MANSION</h1>
            <h3>入居者様専用サイト</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('login_id', 'ユーザーID') !!}
                    {!! Form::text('login_id', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection