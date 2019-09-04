@extends('layouts.base')

@section('content')
    <div class="center-box">
        <div class="flex-1 align-self-center">
            <img src="{{ asset('storage/images/authentication.svg') }}" class="w-6/12 m-auto">
        </div>
        <div class="flex-1 p-4">
            <h1 class="text-3xl">S'inscrire</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>
                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>
                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" class="input" name="password" required autocomplete="new-password">

                @error('password')
                <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>

                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-blue">
                        {{ __('Créer votre compte') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
