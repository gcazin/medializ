@extends('layouts.base')

@section('content')
    <div class="flex justify-center items-center h-full text-gray-700 w-11/12 m-auto">
        <div class="flex-1 dark:text-gray-400">
            <h1 class="text-4xl font-bold mb-3">Votre dose de bonne humeur quotidienne</h1>
            <p class="text-xl">Découvrez les dernières nouveautés en termes de vidéos!</p>
            <a href="{{ route('post.index') }}" class="btn btn-blue btn-xl mt-3">Découvrir le site</a>
        </div>
        <div class="flex-1 text-center">
            <img class="h-64 m-auto" src="{{ asset('storage/images/home-2.svg') }}" alt="home">
        </div>
    </div>
@endsection
