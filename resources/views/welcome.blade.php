<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Shops Matchig</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="{{ secure_asset('css/welcome.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    </head>

    <body>
       

    @if (Auth::check())
    @include('welcom.index')
    @else
    
    @include('commons.navbar')
 <section id="section_top" ">
        
        
     <section class="swiper">
      <div class="swiper-container">
        <div class="swiper-wrapper">

          <div class="swiper-slide slide01">
            <div class="slide-contents">
              <div class="slide-contents-title">
                あなただけの1曲を。<br>
              </div>
              <div class="slide-contents-text">
                世界中の楽曲をチェック。<br>
                あの音楽が見つかる。<br>
              </div>
            </div> <!-- slide-contents -->
          </div> <!-- swiper-slide -->

          <div class="swiper-slide slide02">
            <div class="slide-contents">
              <div class="slide-contents-title">
                音楽を共有しよう。<br>
              </div>
              <div class="slide-contents-text">
                気に入った楽曲をSNSで簡単にシェアできます。<br>
                シェアを通して新しい音楽と出会おう。<br>
              </div>
            </div> <!-- slide-contents -->
          </div> <!-- swiper-slide -->
        </div> <!-- swiper-wrapper -->

        <div class="swiper-button">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div> <!-- swiper-button -->

        <div class="swiper-pagination"></div>
      </div> <!-- swiper-container -->
    </section> <!-- swiper -->
    
        
 </section>
 <section class="free-section-01">
      <div class="container">
        <div class="free-title">
          音楽の楽しさを簡単に。
        </div>
        <div class="free-text">
          厳選された音楽から聴きたい曲が見つかる。<br>
          最新楽曲情報をすぐさまチェック<br>
          音楽イベント情報を配信。
        </div>
      </div><!-- container -->
    </section><!-- free-section-01 -->

    <section class="free-section-02">
      <div class="container">
        <div class="free-title">
          求めていた⁠音⁠楽⁠が見⁠つ⁠か⁠る
        </div>
        <div class="free-text">
          数千万の楽曲からあなたに合った曲を見つけられます。<br>
          曲⁠名⁠が分⁠か⁠ら⁠な⁠く⁠て⁠も⁠、歌⁠詞のフレーズ⁠や曲⁠の⁠特⁠徴⁠で検⁠索⁠で⁠き⁠ま⁠す⁠。<br>
          ラ⁠イ⁠ブ⁠版⁠、リ⁠ミ⁠ッ⁠ク⁠ス⁠版⁠など、様々な種類の曲を楽しめます。
        </div>
      </div><!-- container -->
    </section><!-- free-section-02 --><section class="free-section-03">
      <div class="container">
        <div class="contents-main">
          <div class="contents-text">
            新⁠し⁠い⁠音⁠楽⁠の⁠世⁠界⁠をあなたの為に。<br>
            高品質な音⁠楽⁠を見⁠つ⁠け⁠ま⁠し⁠ょ⁠う⁠。<br>
            音楽の楽しさをあなたの手に。
        　</div><!-- contents-text -->
       <!--@if (Auth::check())-->
        <!--<div id="bottom_signin_login">-->
        <!--  <div class="contents-button">-->
        <!--    <button  id="welcom_logout">-->
        <!--    　<a href="{{ route('logout.get') }}">-->
        <!--      ログアウト-->
        <!--      </a>-->
        <!--    </button>-->
        <!--  </div>  -->
          
        <!--</div>-->
       
       <!--@else-->
         
        <div id="bottom_signin_login">
          <div class="contents-button" >
          <a href="{{ route('signup.get') }}">
            <button id="welcom_signup">
              会員登録
            </button>
          </a>
          </div>  
          <div class="contents-button">
          <a href="{{ route('login') }}">
            <button id="welcom_login">
              ログイン
            </button>
          </a>  
          </div><!-- contents-button -->
        </div>
        <!--@endif-->
      　</div><!-- contents-main -->
    　</div><!-- container -->
    </section>
    
 <section id="section_gallery" class="container" >
    @include('welcom.gallery')
 </section>
       
    @endif    

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script type="text/javascript">
    var swiper = new Swiper('.swiper-container',{
      speed: 1000, // スピード設定 1000=1秒
      autoplay: true, // 自動切り替え trueで有効 falseで無
      loop: true, // ループ trueで有効 falseで無効
      navigation: {
        nextEl: '.swiper-button-next', // 次のボタンを表示する要素指定
        prevEl: '.swiper-button-prev' // 前のボタンを表示する要素指定
      },
      pagination: {
        el: '.swiper-pagination', // ページネーションを表示する要素指定
      }
    });
    </script>      
   </body>
</html>