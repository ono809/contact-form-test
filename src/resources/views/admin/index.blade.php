@extends('layouts.app')

@section('title', 'Admin 管理画面')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="page-title">
        <h1>FashionablvLate</h1>
        <h2>Admin</h2>
    </div>

    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">

        <select name="gender">
            <option value="">性別</option>
            <option value="全て" @selected(request('gender') == '全て')>全て</option>
            <option value="男性" @selected(request('gender') == '男性')>男性</option>
            <option value="女性" @selected(request('gender') == '女性')>女性</option>
            <option value="その他" @selected(request('gender') == 'その他')>その他</option>
        </select>

        <select name="category">
            <option value="">お問い合わせの種類</option>
            <option value="商品の交換について" @selected(request('category') == '商品の交換について')>商品の交換について</option>
            <option value="返品について" @selected(request('category') == '返品について')>返品について</option>
            <option value="その他" @selected(request('category') == 'その他')>その他</option>
        </select>

        <input type="date" name="date" value="{{ request('date') }}">

        <div class="button-group">
            <button type="submit">検索</button>
            <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
        </div>
    </form>

    <div class="export-pagination">
        <form method="GET" action="{{ route('admin.export') }}">
            <input type="hidden" name="name" value="{{ request('name') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <input type="hidden" name="date" value="{{ request('date') }}">
            <button type="submit">エクスポート</button>
        </form>

        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>

    @if($contacts->count())
    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category }}</td>
                <td><button class="detail-btn" data-id="{{ $contact->id }}">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>該当するデータが見つかりませんでした。</p>
    @endif
</div>

@include('admin.modal')
<script src="{{ asset('js/modal.js') }}"></script>
@endsection