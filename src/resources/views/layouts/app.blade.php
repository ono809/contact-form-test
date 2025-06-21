<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'お問い合わせフォーム')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('styles') {{-- 各ページごとのCSS --}}
</head>
<body>
    <main>
        @yield('content') {{-- 各ページの中身 --}}
    </main>
</body>
</html>
