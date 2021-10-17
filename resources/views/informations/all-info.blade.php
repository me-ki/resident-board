<div class="buildingInfo-container">
    <div>
        @if (count($all_informations) == 0)
            <br>
            <p class="annotation border-bottom">現在インフォメーションはありません</p>
        @else
            <table class="info table table-hover mt-2">
                <tbody>
                    
                    @foreach ($all_informations as $all_information)
                        <tr>
                            <td style="width: 30%">{{ $all_information->created_at->format('Y年m月d日') }}</td>
                            <th style="width: 70%"><a class="link-font" href="{{ route('informations.show', ['information' => $all_information->id]) }}">
                                @if($all_information->to_whom == 0)
                                    全入居者様
                                    {{ $all_information->title }}
                                @elseif($all_information->to_whom == 1)
                                    {{ \App\User::find($all_information->pivot->user_id)->name }}
                                    {!! nl2br(e($all_information->title)) !!}
                                @elseif($all_information->to_whom == 2)
                                    {{ \App\Building::find($all_information->pivot->building_id)->name }}
                                    {!! nl2br(e($all_information->title)) !!}
                                @endif
                            </a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ページネーションのリンク --}}
            <div class="d-flex justify-content-end">{{ $all_informations->links() }}</div>
        @endif
    </div>
</div>