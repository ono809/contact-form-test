@extends('layouts.app')

@section('title', '登録ページ')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    @if ($errors->any())
    <div class="errors" style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>登録</h1>

    <label for="name">お名前</label>
    <input type="text" id="name" name="name" placeholder="山田太郎" value="{{ old('name') }}">
    @error('name')<div style="color:red;">{{ $message }}</div>@enderror

    <label for="email">メールアドレス</label>
    <input type="email" id="email" name="email" placeholder="sample@example.com" value="{{ old('email') }}">
    @error('email')<div style="color:red;">{{ $message }}</div>@enderror

    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" placeholder="••••••••">
    @error('password')<div style="color:red;">{{ $message }}</div>@enderror

    <button type="submit">登録</button>

    <div class="login-link">
        <a href="{{ route('login') }}">ログイン</a>
    </div>
</form>
@endsection
