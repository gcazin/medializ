@extends('layouts.base')


@section('content')
    <div class="mb-3">
        <a href="{{ route('post.index') }}" class="btn btn-blue btn-sm">Précédent</a>
    </div>
    @foreach($posts as $post)
        @if(\Illuminate\Support\Facades\Auth::check())
            @if(\App\User::isAdmin())
                <div class="flex mb-3">
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-green mr-2">Modifier</a>
                    <form action="{{ route('admin.post.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" type="submit">Supprimer</button>
                    </form>
                </div>
            @endif
        @endif

        <div class="flex">

            <!-- show -->
            <div class="w-9/12">
                <div class="detail bg-white dark:bg-gray-800 rounded shadow px-5 py-4 mb-3 ">
                    <h1 class="text-3xl mb-4">{{ $post->title }}</h1>
                    @php
                        $url_part = \Alaouy\Youtube\Youtube::_parse_url_query($post->youtube_url);
                    @endphp
                    <div class="relative h-0 overflow-hidden" style="padding-top: 30px; padding-bottom: 56.25%">
                        <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{$url_part['v']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
                    </div>
                    <p class="mt-4">{{ $post->description }}</p>
                </div>

                <div class="detail bg-white dark:bg-gray-800 rounded shadow px-5 py-4 mb-3 ">
                    @comments(['model' => $post])
                </div>
            </div>

            <!-- sidebar -->
            <div class="w-3/12 ml-5">
                <div class="box mb-4">
                    <h3 class="px-3 py-2 bg-blue-100 rounded-t text-gray-800 text-xl">Catégories</h3>
                    <ul class="bg-white rounded-b">
                        <li class="px-3 py-2 text-gray-700 border-gray-100 border-b">
                            <a href="{{ route('post.index') }}">Tous</a>
                        </li>
                    </ul>
                </div>

                <div class="box">
                    <h3 class="px-3 py-2 bg-blue-100 rounded-t text-gray-800 text-xl">{{ \App\Post::all()->random()->title }}</h3>
                    <ul class="bg-white rounded-b">
                        <li class="px-3 py-2 text-gray-700 border-gray-100 border-b">
                            <a href="{{ route('post.index') }}">Tous</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    @endforeach
@endsection




