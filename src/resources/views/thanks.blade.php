@extends('layouts.app')

@section('title', '送信完了')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<h2>お問い合わせありがとうございます。</h2>
<p>送信が完了しました。</p>
<a href="{{ route('contact.index') }}">トップへ戻る</a>
@endsection