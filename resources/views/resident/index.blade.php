@extends('layouts.app')

@section('content')

  <!--メインビジュアル画像-->
  <div class="container py-4">
    <div class="position-relative">
      <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
      <div class="img-caption position-absolute text-center bg-light">
        <p class="h1 mt-3">ME-KI MANSION</p>
        <p class="lead">入居者さまの快適な暮らしをサポートいたします</p>
      </div>
    </div>
  </div>
  
  <div class="row mt-3">
      <!--メイン-->
      <div class="information col-sm-8">
        <main>
          <!--入居者宛てお知らせ一覧-->
          @include('informations.user-info')
          <!--建物・全入居者宛てお知らせ一覧-->
          @include('informations.building-info')
        </main>
      </div>
      
      <!--サイドメニュー-->
      @include('commons.sidebar')
  </div>
  
@endsection