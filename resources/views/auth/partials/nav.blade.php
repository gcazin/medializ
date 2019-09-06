@php

use Illuminate\Support\Facades\Route;

function checkRouteName($name) {
    return (Route::currentRouteName() == $name) ? ("text-blue-500 border-b-2 border-blue-500") : null;
}

@endphp

<div class="mt-3 mb-5">
    <nav class="flex flex-col sm:flex-row">
        <a href="{{ route('edit') }}" class="text-gray-600 py-4 pr-6 block hover:text-blue-500 focus:outline-none font-medium {{ checkRouteName("edit") }}">
            Informations basiques
        </a>
        <a href="{{ route('options') }}" class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ checkRouteName("options") }}">
            Options générales
        </a>
        <a class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ checkRouteName("developer") }}">
            Avancés
        </a>
    </nav>
</div>
