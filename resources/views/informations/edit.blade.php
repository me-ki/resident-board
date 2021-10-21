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
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">インフォメーション編集</h4>
                <div class="to_whom mt-4 font-weight-bold">
                    宛先：
                    @if ($information->to_whom == 1)
                        @foreach($residents as $resident)
                            {{ $resident->name }}
                        @endforeach
                    @elseif ($information->to_whom == 2)
                        @foreach($buildings as $building)
                            {{ $building->name }}
                        @endforeach
                    @else
                        全入居者様
                    @endif        
                </div>
                <br>
                <div class="form">
                    {!! Form::model($information, ['route' => ['informations.update', $information->id], 'method' => 'put']) !!}
                        
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
            </div>    
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection