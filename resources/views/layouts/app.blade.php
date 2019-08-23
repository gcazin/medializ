<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans flex flex-col h-full dark:bg-gray-900 dark:text-white">
<header class="nav bg-white dark:bg-gray-800">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    @include("partials.nav", compact('user', $user))
</header>
<main class="content">
    @yield('content')
</main>
<footer class="footer">
    <div class="w-4/5 m-auto flex py-5 flex-col lg:flex-row">
        <div class="flex-1 lg:mr-5">
            <h1 class="">{{ config('app.name') }}</h1>
        </div>
        <div class="flex-1 lg:mr-5 my-5">
            <h1 class="">Informations légales</h1>
        </div>
        <div class="flex-1">
            <h1 class="">Newsletter</h1>
            <input type="text" class="input my-2" placeholder="{{ (\Illuminate\Support\Facades\Auth::check()) ? \Illuminate\Support\Facades\Auth::user()->email : "Votre adresse email" }}">
            <button type="submit" class="btn btn-blue btn-block">Inscription</button>
        </div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
