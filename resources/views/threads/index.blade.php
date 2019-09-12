@extends('layouts.base')

@section('content')
    @php
        $posts = \App\Post::where('category_id', 2)->get();
    @endphp
    <h1 class="text-2xl pb-4 pt-2">Les dernières vidéos Youtube publiées</h1>
    @foreach($posts as $post)
        <div class="flex align-items-center justify-content-center mb-3">
            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div class="w-3/12 bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{$post->image}}')" title="Woman holding a mug"></div>
                <div class="w-9/12 border border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded p-4 justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
                        <p class="text-gray-700 text-base truncate">{{ $post->description }}</p>
                    </div>
                    <div class="flex items-center">
                        <div class="text-sm">
                            <p class="text-gray-600">
                                Publié le {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                à {{Carbon\Carbon::parse($post->created_at)->format('h\hi')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
