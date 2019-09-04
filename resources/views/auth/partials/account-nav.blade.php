@php

use Illuminate\Support\Facades\Route;

function checkRouteName($name) {
    return (Route::currentRouteName() == $name) ? ("text-blue-500 border-b-2 border-blue-500") : null;
}

@endphp

<div class="mt-3 mb-5">
    <nav class="flex flex-col sm:flex-row">
        <a href="{{ route('profile') }}" class="text-gray-600 py-4 pr-6 block hover:text-blue-500 focus:outline-none font-medium {{ checkRouteName("profile") }}">
            Informations basiques
        </a>
        <a href="{{ route('settings') }}" class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ checkRouteName("settings") }}">
            Options générales
        </a>
        <a class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ checkRouteName("developer") }}">
            Avancés
        </a>
    </nav>
</div>
