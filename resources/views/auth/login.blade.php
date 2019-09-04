@extends('layouts.base')

@section('content')
    <div class="center-box flex-col lg:flex-row">
        <div class="flex-1 self-center">
            <img src="{{ asset('storage/images/login.svg') }}" class="lg:w-6/12 w-4/12 m-auto">
        </div>
        <div class="w-10/12 lg:flex-1 p-4">
            <h1 class="text-3xl">Connexion</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">{{ __('Adresse mail') }}</label>
                <input class="input" name="email" id="email" type="email" placeholder="jane@example.com">
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" class="input" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror

                <div class="flex justify-content-between mt-3">
                    <div class="flex-1">
                        <label class="custom-label flex">
                            <div class="bg-white shadow w-6 h-6 p-1 flex justify-center items-center mr-2 border-blue-200 border-solid border">
                                <input type="checkbox" class="hidden" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <svg class="hidden w-4 h-4 text-blue-500 pointer-events-none" viewBox="0 0 172 172"><g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/></g></svg>
                            </div>
                            <span class="select-none"> Se souvenir de moi</span>
                        </label>
                    </div>

                    <div class="flex-1 text-right">
                        <button type="submit" class="btn btn-blue btn-block ">
                            {{ __('Connexion') }}
                        </button>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection
