@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">FAQ詳細</p>
        </div>
      </div>
    </div>
    
    {{-- FAQ詳細 --}}
    <div class="container mt-3">
      <div class="row">
        <div class="main col-sm-8">
            <h4 class="title border-bottom mt-1 pb-2 mb-2">{{ $faq->question }}</h4>

            <p class="mt-3" style="line-height:2rem">{{ $faq->answer}}</p>
            
            <br>
            
            @if(Auth::user()->category == '5')
            
              {{-- スタッフには作成者・更新者を表示 --}}
              <small class="float-right">作成日：{{ $faq->created_at }}　作成者：{{ $faq->created_userName }}</small>
              <br>
              <small class="float-right">更新日：{{ $faq->updated_at }}　更新者：{{ $faq->updated_userName }}</small>
              
              {{-- スタッフには編集・削除ボタンを表示 --}}
              <div>
                <div class="d-flex justify-content-end mt-5">
                  {{-- FAQ編集ページへのリンク --}}
                  {!! link_to_route('faqs.edit', '編　集', ['faq' => $faq->id], ['class' => 'btn btn-secondary']) !!}
              
                　{{-- FAQ削除ボタン --}}
                  {!! Form::open(['route' => ['faqs.destroy', $faq->id], 'method' => 'delete']) !!}
                      {!! Form::submit('削　除', ['class' => 'btn btn-danger']) !!}
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