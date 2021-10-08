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

<div class="row mt-5">
    <div class="information col-sm-8">
        <h4 class="title">インフォメーション</h4>
    </div>
    
    <div class="aside col-sm-4">
        <ul>
            <li class="nav-item">{!! link_to_route('buildings.index', '管理物件一覧', [], ['class' => 'nav-link']) !!}</li>
            <li class="nav-item">{!! link_to_route('users.index', '会員一覧', [], ['class' => 'nav-link']) !!}</li>
        </ul>
        
    </div> 
</div>