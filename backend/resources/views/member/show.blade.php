<h1>詳細表示</h1>

<div>
    名前
    {{$member->name}}
</div>

<div>
    パスワード
    {{$member->password}}
</div>

<div>
    作成日時
    {{$member->created_at}}
</div>

<div>
    更新日時
    {{$member->updated_at}}
</div>

<a href="{{ route('member.edit', ['id' => $member->id]) }}"> {{ __('編集') }} </a>

<form method="POST" action="{{route('member.destroy',['id'=>$member->id])}}">
    @csrf
    <button type="submit">削除</button>
</form>

<a href="{{ route('member.index') }}"> {{ __('一覧に戻る') }} </a>
