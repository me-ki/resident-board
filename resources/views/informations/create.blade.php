@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">インフォメーション</p>
        </div>
      </div>
    </div>
    
    <div class="container">
        <h4 class="title mr-auto mt-1">インフォメーション作成</h4>
        <div class="row">
            <div class="col-sm-8">
                {!! Form::model($information, ['route' => 'informations.store']) !!}
                    
                    <div class="form-group">
                        @if ($kinds == "resident")
                            {!! Form::hidden('kinds', $kinds) !!}
                        @elseif ($kinds == "building")
                            {!! Form::hidden('kinds', $kinds) !!}
                        @else
                            {!! Form::hidden('kinds', $kinds) !!}
                        @endif
                    </div>
                    
                    <div class="form-group">
                        @if ($kinds == "resident")
                            {!! Form::label('user_name', '宛先') !!}
                            {!! Form::text('user_name', \App\User::find($postTo_id)->name, ['class' => 'form-control', 'disabled']) !!}
                        @elseif ($kinds == "building")
                            {!! Form::label('building_name', '宛先') !!}
                            {!! Form::text('building_name', \App\Building::find($postTo_id)->name, ['class' => 'form-control', 'disabled']) !!}
                        @else
                            {!! Form::label('user_name', '宛先') !!}
                            {!! Form::text('user_name', '全入居者', ['class' => 'form-control', 'disabled']) !!}
                        @endif                        
                    </div>
                    
                    <div class="form-group">
                        {!! Form::hidden('postTo_id', $postTo_id) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', '内　容') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group text-center">
                        {!! Form::submit('投　稿', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
    
                {!! Form::close() !!}
            </div>
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection