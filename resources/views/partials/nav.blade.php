<div class="border-gray-300 dark:border-gray-900 border-b border-solid">
    <nav class="flex items-center justify-between flex-wrap px-5 py-4 w-11/12 m-auto">
        <div class="flex items-center flex-shrink-0 text-black mr-6">
            <a href="{{ route('home') }}" class="font-semibold text-xl tracking-tight dark:text-gray-200">{{ config('app.name') }}</a>
        </div>
        <div class="block lg:hidden">
            <button class="navbar-burger flex items-center px-3 py-2 border rounded text-blue-500 border-blue-500 hover:text-blue-700 hover:border-blue-700">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div id="main-nav" class="w-full hidden lg:block lg:inline flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a href="{{ route('post.index') }}" class="navbar-items nav dark:text-gray-400 dark-hover:text-gray-600">
                    Zap Youtube
                </a>
                <a href="{{ route('twittosphere') }}" class="navbar-items nav dark:text-gray-400 dark-hover:text-gray-600">
                    Thread Twitter
                </a>

            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block sm:float-none lg:float-right sm:mt-3 lg:mt-0">

                    @if(Auth::check())
                        <div class="relative text-sm">
                            <button id="userButton" class="flex items-center focus:outline-none mr-3">
                                <img class="w-8 h-8 rounded-full mr-2" src="/storage/avatars/{{ auth()->user()->avatar }}" alt="Avatar of User"> <span class="hidden md:inline-block">{{ auth()->user()->name }}</span>
                                <i class="ml-1 align-baseline text-xs fas fa-chevron-down"></i>
                            </button>
                            <div id="userMenu" class="bg-white border border-blue-100 dark:border-gray-800 border-solid dark:bg-gray-700 rounded shadow-md mt-4 absolute pin-t pin-r min-w-full overflow-auto z-30 invisible shadow">
                                <ul class="list-reset">
                                    <li><a href="{{ route('edit') }}" class="px-4 py-3 block text-black dark:text-gray-300 hover:bg-gray-200 dark-hover:bg-gray-800 no-underline hover:no-underline">Mon compte</a></li>
                                    <li><a href="{{ route('options') }}" class="px-4 py-3 block text-black dark:text-gray-300 hover:bg-gray-200 dark-hover:bg-gray-800 no-underline hover:no-underline">Réglages</a></li>
                                    @if(auth()->user()->role_id === 1)
                                        <li><a href="{{ route('admin.index') }}" class="px-4 py-3 block text-black dark:text-gray-300 hover:bg-gray-200 dark-hover:bg-gray-800 no-underline hover:no-underline">Administration</a></li>
                                    @endif
                                    <li><hr class="border-t mx-2 border-gray-200 dark:border-gray-600"></li>
                                    <li><a href="{{ route('logout') }}" class="px-4 py-3 block text-red-500 dark:text-red-300 hover:bg-gray-200 dark-hover:bg-gray-800 no-underline hover:no-underline">Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light mr-1">Se connecter</a>
                        <a href="{{ route('register') }}" class="btn btn-green">S'inscrire</a>
                    @endif
                </div>

            </div>
        </div>
    </nav>
</div>

@if(\Request::is('media') OR \Request::is('media/*'))
    <div class="bg-gray-100 dark:bg-gray-800 shadow px-5 py-3">
        <nav class="flex items-center justify-between flex-wrap w-11/12 m-auto">
            <div class="w-full block">
                <div class="text-sm overflow-x-auto overflow-y-hidden whitespace-no-wrap">
                    @php
                        $subcategories = \App\Subcategory::all();
                    @endphp
                    @foreach($subcategories as $subcategory)
                        <a href="{{ route('subcategory', $subcategory->id) }}" class="navbar-items subcategory">{{ $subcategory->title }}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
@endif

@if(\Request::is('admin') OR \Request::is('admin/*'))
    <div class="bg-gray-100 dark:bg-gray-800 shadow px-5 py-3">
        <nav class="flex items-center justify-between flex-wrap w-11/12 m-auto">
            <div class="w-full block">
                <div class="text-sm overflow-x-auto overflow-y-hidden whitespace-no-wrap">
                    <a href="{{ route('admin.index') }}" class="navbar-items subcategory">{{ __('Administration') }}</a>
                    <a href="{{ route('admin.post.create') }}" class="navbar-items subcategory">{{ __('Créer un article') }}</a>
                    <a href="{{ route('admin.subcategory.create') }}" class="navbar-items subcategory">{{ __('Créer une sous-catégorie') }}</a>
                </div>
            </div>
        </nav>
    </div>
@endif
