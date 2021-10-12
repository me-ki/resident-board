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
        <h4 class="title border-bottom mt-1 pb-2 mb-2">{{ $information->title}}</h4>
        <p>投稿日：{{ $information->created_at->format('Y年m月d日') }}</p>
        <p>{{ $information->content}}</p>
        
    </div>
@endsection