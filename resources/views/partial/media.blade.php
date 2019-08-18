<div class="lg:max-w-sm w-full lg:max-w-full lg:flex lg:mb-4 mr-4">
    <div class="lg:w-3/12 w-full h-48 lg:h-auto bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l" style="background-image: url('{{$post->image}}')" title="{{ $post->title }}"></div>
    <div class="lg:w-9/12 border border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded p-4 lg:justify-between leading-normal">
        <div class="mb-8">
            <a href="{{ route('detail', [$post->id, $post->slug]) }}" class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</a>
            <p class="text-gray-700 text-base truncate">{{ $post->description }}</p>
        </div>
        <div class="flex items-center">
            <div class="text-sm">
                <p class="text-gray-600 mb-2">
                    Publié le {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                    à {{Carbon\Carbon::parse($post->created_at)->format('h\hi')}}
                    dans la catégorie {{ \App\Subcategory::find($post->subcategory_id)->title }}
                </p>
                @if(\App\User::isAdmin())
                    <a href="{{ route('admin.delete', $post->id) }}" class="btn btn-red btn-sm">Supprimer le post</a>
                @endif
            </div>
        </div>
    </div>
</div>
