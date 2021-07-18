<h1>新規作成</h1>

<form method="POST" action="{{ route('member.store') }}">
    @csrf

    <div>
    <label for="form-name">名前</label>
    <input type="text" name="name" id="form-name" required>
    </div>

    <div>
    <label for="form-password">パスワード</label>
    <input type="password" name="password" id="form-password" required>
    </div>

    <button type="submit">登録</button>

    <a href="{{ route('member.index') }}">{{ __('一覧へ戻る') }}</a>

</form>