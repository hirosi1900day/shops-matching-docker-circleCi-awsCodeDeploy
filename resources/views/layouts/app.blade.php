<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Shops Matchig</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 
        
       
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        
    </head>

    <body>
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')
       
        <div>
            </br>
            </br>
            </br>
            </br>
            </br>
               
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
            
        </div>
        
        <!--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
        <script src="/js/app.js"></script>
        <script src="{{ secure_asset('/js/loading.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="{{ secure_asset('/js/main.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
    </body>
</html>