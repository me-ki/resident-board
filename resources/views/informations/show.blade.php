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
    <div class="container mt-3">
      <div class="row">
        <div class="main col-sm-8">
            <h4 class="title border-bottom mt-1 pb-2 mb-2">{{ $information->title }}</h4>
            <p>投稿日：{{ $information->created_at->format('Y年m月d日') }}</p>
            
            {{-- スタッフには宛先も表示 --}}
            @if(Auth::user()->category == 5)
              @if($information->to_whom == 0)
                <p>宛　先：全入居者様</p>
              @elseif($information->to_whom == 1)
                <p>宛　先:
                  @foreach($residents as $resident)
                     {{ $resident->name }}　
                  @endforeach
                </p>
            
              @elseif($information->to_whom == 2)
                <p>宛　先:
                  @foreach($buildings as $building)
                     {{ $building->name }}　
                  @endforeach
                </p>
              @endif
            @endif
            
            <p>{{ $information->content}}</p>
            
            <br>
            
            @if(Auth::user()->category == '5')
            
              {{-- スタッフには作成者・更新者を表示 --}}
              <small class="float-right">作成日：{{ $information->created_at }}　作成者：{{ $information->created_userName }}</small>
              <br>
              <small class="float-right">更新日：{{ $information->updated_at }}　更新者：{{ $information->updated_userName }}</small>
              
              {{-- スタッフには編集・削除ボタンを表示 --}}
              <div>
                <div class="d-flex justify-content-end mt-5">
                  {{-- インフォメーション編集ページへのリンク --}}
                  {!! link_to_route('informations.edit', '編　集', ['information' => $information->id], ['class' => 'btn btn-secondary']) !!}
              
                　{{-- インフォメーション削除ボタン --}}
                  {!! Form::open(['route' => ['informations.destroy', $information->id], 'method' => 'delete']) !!}
                      {!! Form::submit('削　除', ['class' => 'btn btn-danger btn-dell']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
            @endif
            
        </div>
        {{-- サイドバー表示 --}}
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