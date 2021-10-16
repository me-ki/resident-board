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
    
    {{-- インフォメーション詳細 --}}
    <div class="main">
        <h4 class="title border-bottom mt-1 pb-2 mb-2">{{ $information->title }}</h4>
        <p>投稿日：{{ $information->created_at->format('Y年m月d日') }}</p>
        
        @if($information->to_whom == 1)
        <p>{{ $user->name }}　様</p>
        
        @else($information->to_whom == 2)
        <p>
          @foreach($buildings as $building)
            　
          @endforeach
        </p>  
        @endif
        <p>{{ $information->content}}</p>
    </div>
    
    {{-- スタッフには編集・削除ボタンを表示 --}}
    @if(Auth::user()->category == '2')
      <div class="d-flex justify-content-start mt-5">
        {{-- インフォメーション編集ページへのリンク --}}
        {!! link_to_route('informations.edit', '編　集', ['information' => $information->id], ['class' => 'btn btn-secondary']) !!}
    
      　{{-- インフォメーション削除ボタン --}}
        {!! Form::open(['route' => ['informations.destroy', $information->id], 'method' => 'delete']) !!}
            {!! Form::submit('削　除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </div>
    @endif  
@endsection