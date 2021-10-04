@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">会員基本情報</p>
        </div>
      </div>
    </div>
    
    <div class="container">
        <h4 class="title mr-auto mt-1">基本情報編集</h4>
        <div class="row">
            <div class="col-12">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('name', '名前:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('login_id', 'ログインID') !!}
                        {!! Form::text('login_id', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('category', '種別') !!}
                        {!! Form::select('category', [1 => '入居者', 2 => '社員'], null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group text-center">
                        {!! Form::submit('更　新', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
                {!! Form::close() !!}
                
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection