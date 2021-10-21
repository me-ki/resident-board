@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">ご入居中のQ&A</p>
        </div>
      </div>
    </div>
    
    {{-- 管理物件一覧 --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <div class="d-flex flex-row mt-2">
                    <h4 class="title mr-auto mt-1">Q&A一覧</h4>
                    @if(Auth::user()->category == '5')
                        <div>
                            {{-- FAQ作成ページへのリンク --}}
                            {!! link_to_route('faqs.create', 'FAQ新規作成', [], ['class' => 'btn btn-primary mb-3']) !!}
                        </div>
                    @endif
                </div>
                <div>
                    <table class="faq table table-hover mt-2">
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <th style="width: 70%"><a class="link-font" href="{{ route('faqs.show', ['faq' => $faq->id]) }}">Q. {{ $faq->question }}</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- ページネーションのリンク --}}
                    <div class="d-flex justify-content-end">{{ $faqs->links() }}</div>
                </div>
            </div>
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection