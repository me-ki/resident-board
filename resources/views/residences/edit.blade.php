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
    
    <div class="container">
        <h4 class="title mr-auto mt-1">居住マンション情報更新</h4>
        <div class="row">
            <div class="col-12 mt-2">
                 {!! Form::model($residence, ['route' => ['residences.update', $residence->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('building_id', '建物ID') !!}
                        {!! Form::text('building_id', null, ['class' => 'form-control', 'readonly']) !!}

                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('building_id', '建物名') !!}
                        {!! Form::text('building_id', \App\Building::find($residence->building_id)->name, ['class' => 'form-control', 'disabled']) !!}

                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('room_num', '部屋番号') !!}
                        {!! Form::text('room_num', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス') !!}
                        {!! Form::select('status', [1 => '入居中', 2 => '退去'], null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group text-center">
                        {!! Form::submit('更　新', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
                        
                {!! Form::close() !!}
                
                <div class="form-group text-center">
                    {!! Form::open(['route' => ['residences.destroy', $residence->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削　除', ['class' => 'btn btn-danger w-25']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection