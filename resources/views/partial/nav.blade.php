<div class="border-gray-200 border-b border-solid">
<nav class="flex items-center justify-between flex-wrap p-5 w-11/12 m-auto">
    <div class="flex items-center flex-shrink-0 text-black mr-6">
        <a href="{{ route('home') }}" class="font-semibold text-xl tracking-tight">{{ config('app.name') }}</a>
    </div>
    <div class="block lg:hidden">
        <button class="navbar-burger flex items-center px-3 py-2 border rounded text-blue-500 border-blue-500 hover:text-blue-700 hover:border-blue-700">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div id="main-nav" class="w-full hidden lg:block lg:inline flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="{{ route('media') }}" class="navbar-items nav">
                Zap Youtube
            </a>
            <a href="{{ route('twittosphere') }}" class="navbar-items nav">
                Thread Twitter
            </a>
        </div>
        <div class="py-2 text-right">
            @if(Auth::check())
                <a href="{{ route('profile') }}" class="btn btn-light"><img class="inline rounded-full" style="width: 30px;" src="/storage/avatars/{{ $user->avatar }}"> {{ Auth::user()->name }}</a>
                @if(\App\User::isAdmin())
                    <a href="{{ route('admin.index') }}" class="btn btn-light">Administration</a>
                @endif
                <a href="{{ route('logout') }}" class="btn btn-red">Déconnexion</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-light">S'inscrire</a>
                <a href="{{ route('login') }}" class="btn btn-green">Se connecter</a>
            @endif
        </div>
    </div>
</nav>
</div>

@if(\Request::is('media') OR \Request::is('media/*'))
    <div class="bg-gray-100 shadow px-5 py-3">
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
