@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h2>Contact</h2>

<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <label>お名前 <span style="color: red;">※</span></label><br>
    <input type="text" name="last_name" placeholder="例: 山田">
    <input type="text" name="first_name" placeholder="例: 太郎"><br><br>

    <label>性別 <span style="color: red;">※</span></label><br>
    <label><input type="radio" name="gender" value="1" checked> 男性</label>
    <label><input type="radio" name="gender" value="2"> 女性</label>
    <label><input type="radio" name="gender" value="3"> その他</label><br><br>

    <label>メールアドレス <span style="color: red;">※</span></label><br>
    <input type="email" name="email" placeholder="例: test@example.com"><br><br>

    <label>電話番号</label><br>
    <input type="text" name="tel1" size="5" maxlength="5"> -
    <input type="text" name="tel2" size="5" maxlength="5"> -
    <input type="text" name="tel3" size="5" maxlength="5"><br><br>

    <label>住所 <span style="color: red;">※</span></label><br>
    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"><br><br>

    <label>建物名</label><br>
    <input type="text" name="building_name" placeholder="例: 千駄ヶ谷マンション101"><br><br>

    <label>お問い合わせの種類 <span style="color: red;">※</span></label><br>
    <select name="category">
        <option value="">選択してください</option>
        <option value="商品について">商品について</option>
        <option value="返品について">返品について</option>
        <option value="その他">その他</option>
    </select><br><br>

    <label>お問い合わせ内容 <span style="color: red;">※</span></label><br>
    <textarea name="content" rows="5" placeholder="お問い合わせ内容をご記入ください"></textarea><br><br>

    <button type="submit">確認画面へ</button>
</form>
@endsection
