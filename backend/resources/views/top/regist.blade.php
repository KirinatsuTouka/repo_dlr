<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
<link rel="shortcut icon" href="{{ asset('image/favicon.ico')}}">
    <title>たいとる</title>
</head>
<body>

    <div id="content">

        <div id="main">
            <div>
                <h1>たいとる</h1>
            </div>
    
            <?php
                $counter_file = public_path('count.txt');
                $counter_lenght = 8;
                $fp = fopen($counter_file, 'r+');
                if ($fp) {
                    if (flock($fp, LOCK_EX)) {
                        $counter = fgets($fp, $counter_lenght);
                        flock ($fp, LOCK_UN);
                    }
                }
                fclose ($fp);
                $format = '%0'.$counter_lenght.'d';
                $new_counter = sprintf($format, $counter);
                echo '<p>';
                echo ('あなたは <em>'.$new_counter.'</em> 人目の訪問者です。');
                echo '</p>';
            ?>
        </div>
        
        
        <div id="right-menu">
            <div>
                新規ユーザ登録
            </div>
            
            <br>
            @if (Route::has('register'))
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <x-jet-validation-errors class="error">register</x-jet-validation-errors>
                @if(session('registerror'))
                    {{ Session('registerror')}}
                @endif

                @if (session('status'))
                    <div>
                        {{ session('status') }}
                    </div>
                @endif
        
                <div>
                    <x-jet-label for="name" value="{{ __('ユーザID') }}" /> <br>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
        
                <br>

                <div>
                    <x-jet-label for="password" value="{{ __('パスワード') }}" /> <br>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
        
                <br>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('パスワード(再入力)') }}" /> <br>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                {{-- <div>
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('ログイン情報を記録しておく') }}</span>
                    </label>
                </div> --}}
        
                <br>

                <div>
                    {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('パスワードを忘れたらここをクリック！') }}
                        </a>
                    @endif --}}


                    <x-jet-button>
                        {{ __('新規登録') }}
                    </x-jet-button>
                </div>
            </form>
            @endif
            <br>

            <div>
                <a href="{{ route('top') }}">ログイン画面に戻る</a>
            </div>
        </div>
        

        

    </div>

</body>
</html>