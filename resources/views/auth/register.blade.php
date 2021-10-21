@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">会員新規登録</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">会員新規登録</h4>
                <div class="mt-3">
                    {!! Form::open(['route' => 'signup.post']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '名前') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('login_id', 'ログインID') !!}
                            {!! Form::text('login_id', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('category', '種別') !!}
                            <br>
                            {!! Form::select('category', [10 => '入居者', 5 => '社員'], 0, ['class' => 'form-control']) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('password', 'パスワード') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'パスワード確認') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group text-center">
                            {!! Form::submit('登　録', ['class' => 'btn btn-primary w-25']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>        
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection