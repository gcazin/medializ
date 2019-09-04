<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/nav.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    @if(Request::is('admin/*') || Request::is('admin'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @endif
</head>
<body class="bg-gray-100 font-sans flex flex-col h-full dark:bg-gray-900 dark:text-white">
<header class="nav bg-white dark:bg-gray-800">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    @include("partials.nav", compact('user', $user))
</header>
<main class="content">
    @yield('content')
</main>
<footer class="footer dark:bg-gray-800 bg-gray-700 relative pt-12 mt-20 text-white">
    <div class="absolute h-16 w-full" style="top: -220px;z-index: -1;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path class="footer-wave" fill-opacity="1" d="M0,128L80,138.7C160,149,320,171,480,170.7C640,171,800,149,960,149.3C1120,149,1280,171,1360,181.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
    </div>
    <div class="w-4/5 m-auto flex py-5 flex-col lg:flex-row">
        <div class="flex-1 lg:mr-5">
            <h1 class="">{{ config('app.name') }}</h1>
        </div>
        <div class="flex-1 lg:mr-5 my-5">
            <h1 class="">Informations légales</h1>
        </div>
        <div class="flex-1">
            <h1 class="">Newsletter</h1>
            <input type="text" class="input my-2" placeholder="{{ (\Illuminate\Support\Facades\Auth::check()) ? \Illuminate\Support\Facades\Auth::user()->email : "Votre adresse email" }}">
            <button type="submit" class="btn btn-blue btn-block">Inscription</button>
        </div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
<script>


    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e){
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else {userMenuDiv.classList.add("invisible");}
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {navMenuDiv.classList.add("hidden");}
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while(t.parentNode) {
            if( t == elm ) {return true;}
            t = t.parentNode;
        }
        return false;
    }


</script>
</body>
</html>
