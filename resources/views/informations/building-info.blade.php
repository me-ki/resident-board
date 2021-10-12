<div class="groupInfo-wrapper mt-5">
    <h4 class="title">インフォメーション</h4>
        <div>
            @if (count($user_informations) == 0)
                <br>
                <p class="annotation border-bottom">現在インフォメーションはありません</p>
            @else
                <table class="info table table-hover mt-2">
                    <tbody>
                        @foreach ($user_informations as $user_information)
                            <tr>
                                <td style="width: 15%"->{{ $user_information->created_at->format('Y年m月d日') }}</td>
                                <th style="width: 85%"><a class="link-font" href="{{ route('informations.show', ['information' => $user_information->id]) }}">{{ $user_information->title }}</a></th>
                                
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                {{-- ページネーションのリンク --}}
                <div class="ml-auto">{{ $user_informations->links() }}</div>
            @endif
        </div>
</div>