@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">建物情報</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">建物新規登録</h4>
                <div class="mt-3">
                    {!! Form::model($building, ['route' => 'buildings.store']) !!}
                        
                        <div class="form-group mt-2">
                            {!! Form::label('name', 'マンション名') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('address', '住所') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('units', '戸数') !!}
                            {!! Form::number('units', null, ['class' => 'form-control']) !!}
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