@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<h1>ログイン</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">メールアドレス</label><br>
        <input type="email" name="email" placeholder="sample@example.com" id="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">パスワード</label><br>
        <input type="password" name="password" id="password"placeholder="••••••••">
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">ログイン</button>
</form>

<p><a href="{{ route('register') }}">登録ページへ</a></p>
@endsection
