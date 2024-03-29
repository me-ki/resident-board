@extends('layouts.app')

@section('content')
    <div class="container py-4">
      <div class="position-relative">
        <img src="/image/living_room.jpg" alt="ME-KI MANSION" class="img-fluid rounded">
        <div class="img-caption position-absolute text-center bg-light">
          <p class="h1 mt-3">管理物件情報</p>
        </div>
      </div>
    </div>
    
    {{-- 管理物件一覧 --}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="title mr-auto mt-1 border-bottom">管理物件一覧</h4>
                <div class="d-flex justify-content-between mt-2">
                    <!-- 検索フォーム -->
                    <form method="get" action="" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="建物名や住所">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
                        </div>
                    </form>
                    
                    <div class="mt-3">
                        {{-- インフォ作成ページへのリンク --}}
                        {!! link_to_route('buildings.create', '新規物件登録', [], ['class' => 'btn btn-primary mb-3']) !!}
                    </div>
                </div>
                <div>
                    @if (count($buildings) > 0)
                        @foreach ($buildings as $building)
                        
                            <table class="table table-bordered mb-2">
                                <tbody>
                                    <tr>
                                        <th class="table-active" style="width: 20%">マンション名</th>
                                        <td style="width: 50%">{{ $building->name }}</td>
                                        <th class="table-active" style="width: 15%">戸数</th>
                                        <td style="width: 15%">{{ $building->units }}戸</td>
                                    </tr>
                                    <tr>
                                        <th class="table-active" style="width: 20%">住　所</th>
                                        <td colspan="3" style="width: 40%">{{ $building->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                <div class="mr-2">
                                    {!! link_to_route('informations.create', 'インフォ作成', ['building_id' => $building->id], ['class' => 'btn btn-success btn-sm']) !!}
                                </div>
                                <div>
                                    {!! link_to_route('buildings.edit', '建物編集', ['building' => $building->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">{{ $buildings->appends(['keyword'=>$keyword])->render() }}</div>
                    @endif
                </div>
            </div>
            <!--サイドメニュー-->
            @include('commons.sidebar')
        </div>
    </div>
@endsection