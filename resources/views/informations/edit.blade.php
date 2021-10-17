@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">インフォメーション詳細</p>
        </div>
      </div>
    </div>
    
    <div class="container">
        <h4 class="title mr-auto mt-1">インフォメーション編集</h4>
        <div class="row">
            <div class="col-sm-8">
                {!! Form::model($information, ['route' => ['informations.update', $information->id], 'method' => 'put']) !!}
                    
                    <div class="form-group">
                        @if ($information->to_whom == 1)
                            {!! Form::label('user_name', '宛先') !!}
                            {!! Form::text('user_name', $resident->name, ['class' => 'form-control', 'disabled']) !!}
                        @elseif ($information->to_whom == 2)
                        
                            @foreach($buildings as $building)
                                {!! Form::label('building_name', '宛先') !!}
                                {!! Form::text('building_name', $building->name, ['class' => 'form-control', 'disabled']) !!}
                            @endforeach
                        @else
                            {!! Form::label('user_name', '宛先') !!}
                            {!! Form::text('user_name', '全入居者', ['class' => 'form-control', 'disabled']) !!}
                        @endif                        
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}
                        {!! Form::text('title', $information->title, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', '内　容') !!}
                        {!! Form::textarea('content', $information->content, ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group text-center">
                        {!! Form::submit('更　新', ['class' => 'btn btn-primary w-25']) !!}
                    </div>
                    
    
                {!! Form::close() !!}
            </div>
            
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection