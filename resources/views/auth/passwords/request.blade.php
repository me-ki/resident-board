@extends('layouts.app')

@section('content')

  <!--メインビジュアル画像-->
  <div class="container py-4">
  <div class="position-relative">
    <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
    <div class="img-caption position-absolute text-center bg-light">
      <p class="h1 mt-3">店舗案内</p>
    </div>
  </div>
    </div>
  
  <div class="container mt-3">
    <div class="row mt-3">
      <!--メイン-->
      <div class="information col-sm-8">
        <h4 class="title mr-auto mt-1 border-bottom">パスワード変更</h4>
          <div class="card mt-4">
            <div class="card-body">
              <form method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="email">メールアドレス</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                  </div>
                  <button type="submit" class="btn btn-primary">パスワード変更用URLを送信</button>
              </form>
          </div>
        </div>
        
      </div>
      <!--サイドメニュー-->
      @include('commons.sidebar')
    </div>
  </div>
  
@endsection