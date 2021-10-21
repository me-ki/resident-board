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
    
    {{-- 会員情報詳細 --}}
    <div class="container">
        <div class="basic-info">
            <div class="d-flex flex-row mt-2">
                <h4 class="title mr-auto mt-1">顧客情報</h4>
                <div>
                    {{-- 基本情報編集ページへのリンク --}}
                    {!! link_to_route('users.edit', '顧客情報編集', ['user' => $user->id], ['class' => 'btn btn-secondary btn-sm']) !!}
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
                            <td style="width: 30%">
                                @if ($user->category == 10) 
                                    入居者
                                @elseif ($user->category == 5)
                                    社員
                                @endif
                            </td>
                            <th class="table-active" style="width: 20%">Email</th>
                            <td style="width: 30%">{{ $user->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="residences mt-5">
            <div class="d-flex flex-row mt-2">
                <h4 class="title mr-auto mt-1">居住マンション</h4>
                <div>
                    {{-- 居住マンション登録ページへのリンク --}}
                    {!! link_to_route('residences.create', '新規登録', ['user_id' => $user->id], ['class' => 'btn btn-primary btn-sm mb-1']) !!}
                </div>
            </div>
            <div>
                @if (count($residences) > 0)
                    @foreach ($residences as $residence)
                        <table class="table table-bordered mb-2">
                            <tbody>
                                <tr>
                                    <th class="table-active" style="width: 20%">更新日</th>
                                    <td style="width: 30%">{{ $residence->updated_at->format('Y年m月d日') }}</td>
                                    <th class="table-active" style="width: 20%">ステータス</th>
                                    <td style="width: 30%">
                                        @if ($residence->status == 1) 
                                            入居中
                                        @elseif ($residence->status == 2)
                                            退去
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-active" style="width: 20%">居住マンション</th>
                                    <td style="width: 30%">{{ \App\Building::find($residence->building_id)->name }}</td>
                                    <th class="table-active" style="width: 20%">部屋番号</th>
                                    <td style="width: 30%">{{ $residence->room_num }}</td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <div>
                                {!! link_to_route('residences.edit', '編　集', ['residence' => $residence->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="mt-2 mb-5">居住マンション登録なし</p>
                @endif
            </div>
        </div>
    </div>
@endsection