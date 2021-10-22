@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">お問い合わせ</p>
        </div>
      </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">お問い合わせ</h4>
                
                <!-- Page Content -->
                <div class="container mt-5 p-lg-5 bg-light">
                
                    <p>お問合せを送信しました。</p>
                    <p>確認メールを送りましたので、ご確認ください。</p>
                
                </div><!-- /container -->
            </div>
            
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection