@extends('layouts.app')

@section('content')
    <div class="center-box flex-col">
        @foreach($post as $post_detail)
            <div class="flex-1">
                <h1 class="text-3xl py-4">{{ $post_detail->title }}</h1>
            </div>
            <div class="flex-1">
                @php
                    $url_part = \Alaouy\Youtube\Youtube::_parse_url_query($post_detail->youtube_url);
                @endphp
                <iframe class="w-full lg:h-full h-48" src="https://www.youtube.com/embed/{{$url_part['v']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
            <div class="flex-1">
                <p class="py-4">{{ $post_detail->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
