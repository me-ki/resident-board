@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">建物情報詳細</p>
        </div>
      </div>
    </div>
    
    {{-- 建物登録情報 --}}
    <div class="container">
        <h4 class="title mr-auto mt-1">建物情報編集</h4>
        <div class="row">
            <div class="col-12 mt-2">
                {!! Form::model($building, ['route' => ['buildings.update', $building->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
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
                        {!! Form::submit('更　新', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
                {!! Form::close() !!}
                
                <div class="form-group text-center">
                    {!! Form::open(['route' => ['buildings.destroy', $building->id], 'method' => 'delete']) !!}
                        {!! Form::submit('建物情報削除', ['class' => 'btn btn-danger w-25']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection