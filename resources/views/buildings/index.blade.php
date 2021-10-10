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
    <div class="container">
        <div class="d-flex flex-row mt-2">
            <h4 class="title mr-auto mt-1">管理物件一覧</h4>
            <div>
                {{-- 新規管理物件登録へのリンク --}}
                {!! link_to_route('buildings.create', '新規物件登録', [], ['class' => 'btn btn-primary mb-3']) !!}
            </div>
        </div>
        <div>
            @if (count($buildings) > 0)
                @foreach ($buildings as $building)
                
                    <table class="table table-bordered mb-2">
                        <tbody>
                            <tr>
                                <th class="table-active" style="width: 20%">建物ID</th>
                                <td style="width: 30%">{{ $building->id }}</td>
                                <th class="table-active" style="width: 20%">マンション名</th>
                                <td style="width: 30%">{{ $building->name }}</td>
                            </tr>
                            <tr>
                                <th class="table-active" style="width: 20%">住　所</th>
                                <td style="width: 30%">{{ $building->address }}</td>
                                <th class="table-active" style="width: 20%">戸数</th>
                                <td style="width: 30%">{{ $building->units }}戸</td>
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
            @endif
        </div>
    </div>
@endsection