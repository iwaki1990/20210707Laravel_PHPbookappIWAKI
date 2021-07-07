@extends('layouts.hello')
<style>
   th {
      background-color: black;
      color: white;
      padding: 5px 30px;
    }
    td {
      border: 1px solid black;
      padding: 5px 30px;
      text-align: center;
    }
    svg.w-5.h-5 {  /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
</style>
@section('title', 'index.blade.php')


@section('content')
@if (Auth::check())
<p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
@else
<p>※ログインしていません。（<a href="/login">ログイン</a>｜
   <a href="/register">登録</a>）</p>
@endif
<table>
  <tr>
    <th> <a href="?sort=name">Name</a> </th>
    <th> <a href="?sort=age">Age</a> </th>
  </tr>
  @foreach ($items as $item)
  <tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->age }}</td>
  </tr>
  @endforeach
</table>
{{ $items->appends(['sort'=>$sort])->links() }}
@endsection