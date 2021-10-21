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
            <h4 class="title mr-auto mt-1 border-bottom">店舗一覧</h4>
            
            <div class="shop-info d-flex flex-row">
              <p class="shop">
                <img src="/image/office.jpg" alt="shop" class="img-fluid rounded">
              </p>
              <table class="table">
                  <tr class="shop-name">
                      <th colspan="2">MI-KI MANSION 谷山店</th>
                  </tr>
                  <tr>
                      <th>所在地</th>
                      <tb>鹿児島県鹿児島市〇〇〇</tb>
                  </tr>
                  <tr>
                      <th>営業時間</th>
                      <tb>10:00－18:00</tb>
                  </tr>
                  <tr>
                      <th>定休日</th>
                      <tb>水曜日・祝日</tb>
                  </tr>
              </table>
            </div>
        </div>
        
        <!--サイドメニュー-->
        @include('commons.sidebar')
    </div>
  </div>
  
@endsection