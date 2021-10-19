@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">会員情報</p>
        </div>
      </div>
    </div>
    
    {{-- 会員情報一覧 --}}
    <div class="row">
        <div class="container col-sm-8">
            <div class="d-flex flex-row mt-2">
                <h4 class="title mr-auto mt-1">会員一覧</h4>
                <div>
                    {{-- 新規会員登録へのリンク --}}
                    {!! link_to_route('signup.get', '新規会員登録', [], ['class' => 'btn btn-primary mb-3']) !!}
                </div>
            </div>
            <div>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                    
                        <table class="table table-bordered mb-2">
                            <tbody>
                                <tr>
                                    <th class="table-active" style="width: 20%">名　　前</th>
                                    <td style="width: 30%">{{ $user->name }}</td>
                                    <th class="table-active" style="width: 20%">種　　別</th>
                                    <td style="width: 30%">
                                        @if ($user->category == 10) 
                                            入居者
                                        @elseif ($user->category == 5)
                                            社員
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-active" style="width: 20%">居住マンション</th>
                                    <td style="width: 30%">
                                        @if($user->residences->first())
                                        {{ \App\Building::find($user->residences->first()->building_id)->name }}
                                        @endif
                                    </td>
                                    <th class="table-active" style="width: 20%">ステータス</th>
                                        
                                    <td style="width: 30%">
                                        @if($user->residences->first())
                                            @if ($user->residences->first()->status == 1)
                                            入居中
                                            @elseif($user->residences->first()->status == 2)
                                            退去
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <div class="mr-3">
                                {!! link_to_route('users.show', '会員詳細', ['user' => $user->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                            </div>
                            <div>
                                {!! link_to_route('informations.create', 'お知らせ作成', ['user_id' => $user->id], ['class' => 'btn btn-success btn-sm']) !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!--サイドメニュー-->
        @include('commons.sidebar')
    </div>
@endsection