@extends('layouts.app')

@section('title', '確認画面')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h2>Confirm</h2>

<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <table>
        <tr><th>お名前</th><td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td></tr>
        <tr><th>性別</th><td>{{ $inputs['gender'] === '1' ? '男性' : ($inputs['gender'] === '2' ? '女性' : 'その他') }}</td></tr>
        <tr><th>メールアドレス</th><td>{{ $inputs['email'] }}</td></tr>
        <tr><th>電話番号</th><td>{{ $inputs['tel1'] }}-{{ $inputs['tel2'] }}-{{ $inputs['tel3'] }}</td></tr>
        <tr><th>住所</th><td>{{ $inputs['address'] }}</td></tr>
        <tr><th>建物名</th><td>{{ $inputs['building_name'] }}</td></tr>
        <tr><th>お問い合わせの種類</th><td>{{ $inputs['category'] }}</td></tr>
        <tr><th>お問い合わせ内容</th><td>{{ $inputs['content'] }}</td></tr>
    </table>

    {{-- Hiddenで全データ送る --}}
    @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <button type="submit" name="action" value="submit">送信</button>
    <button type="submit" name="action" value="back">修正</button>
</form>
@endsection
