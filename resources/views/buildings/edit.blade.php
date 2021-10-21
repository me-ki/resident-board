@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">建物情報詳細</p>
        </div>
      </div>
    </div>
    
    {{-- 建物登録情報 --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">建物情報編集</h4>
                <div class="mt-3">
                    {!! Form::model($building, ['route' => ['buildings.update', $building->id], 'method' => 'put']) !!}
        
                        <div class="form-group">
                            {!! Form::label('name', 'マンション名') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('address', '住所') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('units', '戸数') !!}
                            {!! Form::number('units', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group text-center">
                            {!! Form::submit('更　新', ['class' => 'btn btn-primary w-25']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                
                <div class="form-group text-center">
                    {!! Form::open(['route' => ['buildings.destroy', $building->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削　除', ['class' => 'btn btn-danger btn-dell w-25']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection

@section('btn-dell')
  <script>
  $(function (){
      $(".btn-dell").click(function(){
          if(confirm("本当に削除しますか？")){
              // そのままsubmit処理を実行（※削除）
          }else{
              // キャンセル
              return false;
          }
      });
  });
  </script>
@endsection