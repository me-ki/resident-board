@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">会員情報詳細</p>
        </div>
      </div>
    </div>
    
    {{-- 会員情報一覧 --}}
    <div class="container">
        <div class="basic-info">
            <div class="d-flex flex-row mt-2">
                <h4 class="title mr-auto mt-1">基本情報</h4>
                <div>
                    {{-- 基本情報修正ページへのリンク --}}
                    {!! link_to_route('signup.get', '編集', [], ['class' => 'btn btn-secondary btn-sm mb-1']) !!}
                </div>
            </div>
            <div>
                <table class="table table-bordered mb-2">
                    <tbody>
                        <tr>
                            <th class="table-active" style="width: 20%">名　　前</th>
                            <td style="width: 30%">{{ $user->name }}</td>
                            <th class="table-active" style="width: 20%">ログインID</th>
                            <td style="width: 30%">{{ $user->login_id }}</td>
                        </tr>
                        <tr>
                            <th class="table-active" style="width: 20%">種　　別</th>
                            <td style="width: 30%">{{ $user->category }}</td>
                            <th class="table-active" style="width: 20%">Email</th>
                            <td style="width: 30%">{{ $user->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="status-info">
                <div class="d-flex flex-row mt-2">
                <h4 class="title mr-auto mt-1">ステータス</h4>
                <div>
                    {{-- ステータス情報修正ページへのリンク --}}
                    {!! link_to_route('signup.get', '更新', [], ['class' => 'btn btn-secondary btn-sm mb-1']) !!}
                </div>
            </div>
            <div>
                @if (count($attributes) > 0)
                    @foreach ($attributes as $attribute)
                        <table class="table table-bordered mb-2">
                            <tbody>
                                <tr>
                                    <th class="table-active" style="width: 20%">名　　前</th>
                                    <td style="width: 30%">{{ $user->name }}</td>
                                    <th class="table-active" style="width: 20%">種　　別</th>
                                    <td style="width: 30%">{{ $user->category }}</td>
                                </tr>
                                <tr>
                                    <th class="table-active" style="width: 20%">ステータス</th>
                                    <td style="width: 30%"></td>
                                    <th class="table-active" style="width: 20%">居住マンション</th>
                                    <td style="width: 30%">test</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <div class="mr-3">
                                {!! link_to_route('users.show', '詳　細', ['user' => $user->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                            </div>
                            <div>
                                {!! link_to_route('users.show', 'お知らせ', ['user' => $user->id], ['class' => 'btn btn-success btn-sm']) !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection