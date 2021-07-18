<h1>編集</h1>

<form method="POST" action="{{ route('member.update', ['id' => $member->id])}}">
@csrf

    <div>
        名前
        <input type="text" name=name value="{{$member->name}}">
    </div>

    <div>
        パスワード
        <input type="password" name=password value="{{$member->password}}">
    </div>

    <input type="submit" value="更新する">

    <a href="{{ route('member.show', ['id'=> $member->id])}}"> {{ __('詳細に戻る')}} </a>

</form>