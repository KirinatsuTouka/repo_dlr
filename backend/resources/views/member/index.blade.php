<h1>一覧表示</h1>

<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>作成日</th>
        <th>更新日</th>
        <th>詳細</th>
    </tr>
    @foreach($members as $member)
    <tr>
        <td>{{$member->id}}</td>
        <td>{{$member->name}}</td>
        <td>{{$member->created_at}}</td>
        <td>{{$member->updated_at}}</td>
        <td><a href="{{route('member.show', ['id' => $member->id])}}">詳細</a></td>
    </tr>
    @endforeach
</table>

<a href="{{ route('member.create') }}">{{ __('新規作成') }}</a>