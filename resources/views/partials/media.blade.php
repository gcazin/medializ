<div class="lg:max-w-sm w-full lg:max-w-full lg:flex mb-4 lg:mr-4 dark:shadow-2xl shadow">
    <div class="lg:w-3/12 w-full h-48 lg:h-auto bg-cover bg-center rounded-t lg:rounded-t-none lg:rounded-l" style="background-image: url('{{$post->image}}')" title="{{ $post->title }}"></div>
    <div class="lg:w-9/12 dark:bg-gray-800 bg-white rounded-r lg:justify-between leading-normal">
        <div class="p-4">
            <a href="{{ route('detail', [$post->id, $post->slug]) }}" class="dark:text-gray-400 text-gray-900 text-2xl">{{ $post->title }}</a>
            <p class="text-gray-700 dark:text-gray-500 truncate mt-2">{{ $post->description }}</p>
        </div>
        <div class="p-4 flex items-center bg-gray-200 dark:bg-gray-900">
            <div class="text-sm flex-1">
                <p class="text-gray-500 dark:text-gray-700">
                    Publié le {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                    à {{Carbon\Carbon::parse($post->created_at)->format('h\hi')}}
                    dans la catégorie {{ \App\Subcategory::find($post->subcategory_id)->title }}
                </p>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\App\User::isAdmin())
                    <a href="{{ route('admin.update', $post->id) }}" class="btn btn-light btn-sm">Modifier</a>
                    <a href="{{ route('admin.delete', $post->id) }}" class="btn btn-red btn-sm">Supprimer le post</a>
                @endif
            @endif
        </div>
    </div>
</div>
