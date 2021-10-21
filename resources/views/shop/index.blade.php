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
        <h4 class="title mr-auto mt-1">店舗一覧</h4>
        
        <div class="shop-info border d-flex flex-row mt-2">
          <div class="shop-img d-flex align-items-center ml-1">
            <img src="/image/office.jpg" alt="shop" class="img-fluid rounded">
          </div>
          <div class="shop-detail mt-3">
            <h5 class="shop-name font-weight-bold my-2">ME-KI MSNSION 谷山店</h5>
            <div class="mt-4 ml-2">
              <p class="font-weight-bold border-bottom mr-5">所在地</p>
              <p class="detail-text">鹿児島県鹿児島市〇〇〇</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">営業時間</p>
              <p class="detail-text">10：00－18：00</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">定休日</p>
              <p class="detail-text">水曜日・祝日</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">電話番号</p>
              <p class="detail-text">000-000-0000</p>
            </div>
          </div>
        </div>
        
        <div class="shop-info border d-flex flex-row mt-4">
          <div class="shop-img d-flex align-items-center ml-1">
            <img src="/image/office.jpg" alt="shop" class="img-fluid rounded">
          </div>
          <div class="shop-detail mt-3">
            <h5 class="shop-name font-weight-bold my-2">ME-KI MSNSION 鹿屋店</h5>
            <div class="mt-4 ml-2">
              <p class="font-weight-bold border-bottom mr-5">所在地</p>
              <p class="detail-text">鹿児島県鹿児島市〇〇〇</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">営業時間</p>
              <p class="detail-text">10：00－18：00</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">定休日</p>
              <p class="detail-text">水曜日・祝日</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">電話番号</p>
              <p class="detail-text">000-000-0000</p>
            </div>
          </div>
        </div>
        
        <div class="shop-info border d-flex flex-row mt-4">
          <div class="shop-img d-flex align-items-center ml-1">
            <img src="/image/office.jpg" alt="shop" class="img-fluid rounded">
          </div>
          <div class="shop-detail mt-3">
            <h5 class="shop-name font-weight-bold my-2">ME-KI MSNSION 霧島店</h5>
            <div class="mt-4 ml-2">
              <p class="font-weight-bold border-bottom mr-5">所在地</p>
              <p class="detail-text">鹿児島県鹿児島市〇〇〇</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">営業時間</p>
              <p class="detail-text">10：00－18：00</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">定休日</p>
              <p class="detail-text">水曜日・祝日</p>
            </div>
            <div class="mt-2 ml-2">
              <p class="font-weight-bold border-bottom mr-5">電話番号</p>
              <p class="detail-text">000-000-0000</p>
            </div>
          </div>
        </div>
        
      </div>
      <!--サイドメニュー-->
      @include('commons.sidebar')
    </div>
  </div>
  
@endsection