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

<div class="contents-wrapper">
  
  <!--ユーザ宛てインフォメーション一覧-->
  @include('informations.user-info')
  
  <!--建物宛て・全入居者宛てインフォメーション一覧-->
  @include('informations.building-info')
  
</div>