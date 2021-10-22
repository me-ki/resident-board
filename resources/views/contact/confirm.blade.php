@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">お問い合わせ</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">お問い合わせ</h4>
                
                <div class="mt-3">
                    {!! Form::open(['route' => 'contact.post', 'method' => 'post']) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group mt-2">
                            {!! Form::label('last_name', '名字') !!}
                            {!! Form::text('last_name', $request->last_name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        
                        <div class="form-group mt-2">
                            {!! Form::label('first_name', '名前') !!}
                            {!! Form::text('first_name', $request->first_name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        
                        <div class="form-group mt-2">
                            {!! Form::label('email', 'メールアドレス') !!}
                            {!! Form::email('email', $request->email, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        
                        <div class="form-group mt-2">
                            {!! Form::label('note', 'お問合せ内容') !!}
                            {!! Form::textarea('note', $request->note, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        
                        <div class="form-group text-center">
                            {!! Form::submit('送信する', ['class' => 'btn btn-primary w-25']) !!}
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
            
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection