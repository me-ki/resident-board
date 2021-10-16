<div class="buildingInfo-container mt-4">
    <h4 class="title">インフォメーション</h4>
    <div>
        @if (count($building_informations) == 0)
            <br>
            <p class="annotation border-bottom">現在インフォメーションはありません</p>
        @else
            <table class="info table table-hover mt-2">
                <tbody>
                    @foreach ($building_informations as $building_information)
                        <tr>
                            <td style="width: 15%">{{ $building_information->created_at->format('Y年m月d日') }}</td>
                            <th style="width: 85%"><a class="link-font" href="{{ route('informations.show', ['information' => $building_information->id]) }}">
                                @if($building_information->to_whom == 0)
                                    {{ $building_information->title }}
                                @else
                                   {{ \App\Building::find($building_information->pivot->building_id)->name }} ご入居者様へ／{{ $building_information->title }}
                                @endif
                            </a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ページネーションのリンク --}}
            <div class="d-flex justify-content-end">{{ $building_informations->links() }}</div>
        @endif
    </div>
</div>