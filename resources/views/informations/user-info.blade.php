<div class="userInfo-container mt-3">
    <h4 class="title">{{ $user->name }} 様へのお知らせ</h4>
    <div>
        @if (count($user_informations) == 0)
            <br>
            <p class="annotation border-bottom">現在お客様個人へのお知らせはありません</p>
        @else
            <table class="info table table-hover mt-2">
                <tbody>
                    @foreach ($user_informations as $user_information)
                        <tr>
                            <td style="width: 30%">{{ $user_information->created_at->format('Y年m月d日') }}</td>
                            <th style="width: 70%"><a class="link-font" href="{{ route('informations.show', ['information' => $user_information->id]) }}">{{ $user_information->title }}</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- ページネーションのリンク --}}
            <div class="d-flex justify-content-end">{{ $user_informations->links() }}</div>
        @endif
    </div>
</div>