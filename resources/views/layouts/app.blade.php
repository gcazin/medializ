<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col h-full">
<header class="nav">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    @include("partial.nav", compact('user', $user))
</header>
<main class="content">
    @yield('content')
</main>
<footer class="footer">
    div.
</footer>
</body>
</html>
