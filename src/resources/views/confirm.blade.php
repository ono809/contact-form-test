@extends('layouts.app')

@section('title', '確認画面')

@section('content')
<form method="POST" action="{{ route('register.thanks') }}">
    @csrf
    <h1>確認</h1>

    <p><strong>お名前：</strong>{{ $inputs['name'] }}</p>
    <p><strong>メールアドレス：</strong>{{ $inputs['email'] }}</p>

    <input type="hidden" name="name" value="{{ $inputs['name'] }}">
    <input type="hidden" name="email" value="{{ $inputs['email'] }}">
    <input type="hidden" name="password" value="{{ $inputs['password'] }}">

    <button type="submit">送信</button>
</form>
@endsection
