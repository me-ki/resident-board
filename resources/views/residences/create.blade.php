@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">居住マンション情報</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">居住マンション新規登録</h4>
            
                {!! Form::model($residence, ['route' => 'residences.store']) !!}
                    
                    <div class="form-group">
                        {!! Form::hidden('user_id', $userId) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('user_name', '名前') !!}
                        {!! Form::text('user_name', \App\User::find($userId)->name, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('building_id', 'マンション名') !!}
                        {!! Form::select('building_id', $buildings, null, ['class' => 'form-control', 'placeholder' => '選択してください']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('room_num', '部屋番号') !!}
                        {!! Form::text('room_num', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス') !!}
                        {!! Form::select('status', [1 => '入居中', 2 => '退去'], 0, ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group text-center">
                        {!! Form::submit('登　録', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
                    
    
                {!! Form::close() !!}
            </div>
            
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection