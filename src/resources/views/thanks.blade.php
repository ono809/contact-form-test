@extends('layouts.app')

@section('title', '完了画面')

@section('content')
<div style="text-align: center;">
    <h1>登録ありがとうございました！</h1>
    <p><a href="{{ route('login') }}">ログインはこちら</a></p>
</div>
@endsection
