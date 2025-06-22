@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<h1>ユーザー登録</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="name">お名前</label><br>
        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="山田 太郎">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">メールアドレス</label><br>
        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="example@example.com">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">パスワード</label><br>
        <input id="password" type="password" name="password" placeholder="8文字以上の英数字">
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>

<p class="login-link"><a href="{{ route('login') }}">ログインページへ</a></p>

@endsection
