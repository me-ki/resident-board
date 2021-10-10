@extends('layouts.app')

@section('content')

  <!--メインビジュアル画像-->
  <div class="container py-4">
    <div class="position-relative">
      <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
      <div class="img-caption position-absolute text-center bg-light">
        <p class="h1 mt-3">ME-KI MANSION</p>
        <p class="lead">入居者さま専用ページ管理システム</p>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row mt-3">
        <!--メイン-->
        <div class="information col-sm-8">
          <main>
            <div class="d-flex flex-row mt-2">
              <h4 class="title mr-auto mt-1">インフォメーション</h4>
              <div>
                  {{-- インフォ作成ページへのリンク --}}
                  {!! link_to_route('informations.create', '全体インフォ作成', ['to_all' => 'all'], ['class' => 'btn btn-primary mb-3']) !!}
              </div>
            </div>
            <!--インフォ一覧-->
          </main>
        </div>
        
        <!--サイドメニュー-->
        <div class="col-sm-4">
          <aside>
            <ul>
              <li class="linkbox list-unstyled bg-light">
                <a href="buildings"><i class="fas fa-building fa-lg mr-2"></i>管理物件一覧</a>
              </li>
              
              <li class="linkbox list-unstyled bg-light mt-3">
                <a href="users"><i class="fas fa-user fa-lg mr-2"></i>会員一覧</a>
              </li>
            </ul>
          </aside>
        </div>
    </div>
  </div>
@endsection