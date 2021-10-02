<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">ME-KI MANSION</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    @if(Auth::user()->category == '入居者')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                {{-- ユーザTOPページへのリンク --}}
                                <li class="dropdown-item"><a href="#">HOME</a></li>
                                {{-- FAQページへのリンク --}}
                                <li class="dropdown-item"><a href="#">ご入居中のQ＆A</a></li>
                                {{-- 店舗案内ページへのリンク --}}
                                <li class="dropdown-item"><a href="#">店舗案内</a></li>
                                {{-- お問合せフォームへのリンク --}}
                                <li class="dropdown-item"><a href="#">お問い合わせ</a></li>
                                {{-- パスワードリセットへのリンク --}}
                                <li class="dropdown-item"><a href="#">パスワード変更</a></li>
                                <li class="dropdown-divider"></li>
                                {{-- ログアウトへのリンク --}}
                                <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            </ul>
                        </li>
                    @else 
                    {{-- 社員がログインした場合 --}}
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                {{-- 管理物件一覧ページへのリンク --}}
                                <li class="dropdown-item"><a href="#">管理物件一覧</a></li>
                                {{-- 会員一覧ページへのリンク --}}
                                <li class="dropdown-item"><a href="#">会員一覧</a></li>
                                <li class="dropdown-divider"></li>
                                {{-- ログアウトへのリンク --}}
                                <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @endif    
                @else
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>