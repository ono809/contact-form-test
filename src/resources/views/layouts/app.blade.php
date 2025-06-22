<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @yield('styles')
</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>
