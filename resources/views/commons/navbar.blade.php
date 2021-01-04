<header>
    
    
    <!-- ナビゲーションバー -->
    <nav class="navbar fixed-top navbar-expand-xl navbar-light bg-color">
      <div class="container-fluid">

        <!-- ホームリンク -->
        <a href="/" class="navbar-brand" aria-label="ホーム">
           <img class="logo center" src="{{ secure_asset('/img/welcom-main-photo/logo_new.png') }}" alt="">
        </a>

        <!-- 画面幅が狭い時に表示されるハンバーガーメニュー -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
          aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- メニュー -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">Top</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.show',['user' => Auth::id()])}}">MyPage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shops.create')}}">ショップ作成</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('chat.help_view')}}">ヘルプBot</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('mypage.shop')}}">マイショップ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shops.index')}}">ショップ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('favorites.index')}}">お気に入りしたショップ一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('chat.user_index')}}">取引メッセージユーザー</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.create')}}">募集作成</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.user_show')}}">マイ募集</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.index')}}">募集一覧へ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout.get')}}">ログアウト</a>
            </li>
            @else
             <li class="nav-item">
                <a class="nav-link" href="{{route('signup.get')}}">会員登録</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('chat.help_view')}}">ヘルプBot</a>
            </li>
            @endif
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>

</header>