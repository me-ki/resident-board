<div class="buildingInfo-container">
    <div>
        @if (count($informations) == 0)
            <br>
            <p class="annotation border-bottom">作成済みインフォメーションはありません</p>
        @else
            <table class="info table table-striped mt-2">
                <tbody>
                    @foreach ($informations as $information)
                        <tr>
                            <td style="width: 25%">{{ $information->created_at->format('Y年m月d日') }}</td>
                            <td style="width: 20%">
                                @if($information->to_whom == 0)
                                    全　　体
                                @elseif($information->to_whom == 1)
                                    入居者様
                                @elseif($information->to_whom == 2)
                                    マンション
                                @endif
                            </td>
                            <th style="width: 55%"><a class="link-font" href="{{ route('informations.show', ['information' => $information->id]) }}">
                                {{ $information->title }}
                            </a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ページネーションのリンク --}}
            <div class="d-flex justify-content-end">{{ $informations->links() }}</div>
        @endif
    </div>
</div>