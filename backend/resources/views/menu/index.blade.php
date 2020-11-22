<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="shortcut icon" href="{{ asset('image/favicon.ico')}}">
    <title>まいぺーじ</title>
</head>
    
    <body>

        <h2 id="header">
            こんにちは！{{ Auth::user()->name }}さん<br><br>
        </h2>

        <div id="main">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <a href="{{ route('show', 'id') }}">照会処理</a><br>
                    <a href="{{ route('edit', 'id') }}">更新処理</a>
                    @if(session('editmsg'))
                        {{ Session('editmsg') }}
                    @endif
                    <br>
                    @can('admin')
                        <a href={{ route('secret') }}>秘密見せるよ</a>
                    @endcan
                    
                    
                    
                    
                </div>
            </div>

            <div id="right-menu">
                ユーザ名 : {{ Auth::user()->name }}さんでログインしています<br>
                <br>
                <a href="{{ route('top') }}">トップに戻る</a>
                <br>
                <p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('ログアウトする') }}
                        </x-jet-dropdown-link>
                    </form>
                </p>
                <a href=""></a>
            </div>
        </div>

    </body>
</html>