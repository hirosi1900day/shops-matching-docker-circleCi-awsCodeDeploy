<header>
    
    
    <!-- ナビゲーションバー -->
    <nav class="navbar fixed-top navbar-expand-xl navbar-light bg-color">
      <div class="container-fluid">

        <!-- ホームリンク -->
        <a href="#" class="navbar-brand" aria-label="ホーム">
          <i class="fas fa-paw" aria-hidden="true"></i>
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
              <a class="nav-link" href="{{route('chat.help_view')}}">ヘルプぼっと</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('mypage.shop')}}">Myshop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shops.index')}}">ショップ一蘭</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('favorites.index')}}">お気に入り一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('chat.user_index')}}">取引メッセージ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.create')}}">募集作成</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.user_show')}}">Myrecruit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('recruit.index')}}">募集一覧</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout.get')}}">Logout</a>
            </li>
            @else
             <li class="nav-item">
                <a class="nav-link" href="{{route('signup.get')}}">signup</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('chat.help_view')}}">ヘルプぼっと</a>
            </li>
            @endif
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>

</header>