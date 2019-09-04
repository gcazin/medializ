@extends('layouts.base')

@section('content')
    <div class="w-9/12 m-auto">
        <h1 class="text-xl">Informations du compte</h1>
        @include('auth.partials.account-nav')
        <div class="shadow">
            <div class="p-3 bg-white dark:bg-gray-700 rounded-t">{{ __("Modifier des éléments de votre compte ici.") }}</div>
            <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-b">
                <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('patch') }}
                    <!--<div class="form-group">
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>-->
                    <label for="name">Pseudo</label>
                    <input name="name" type="text" id="name" class="input" value="{{ $user->name }}">
                    <label for="email">Adresse mail</label>
                    <input name="email" type="email" id="email" class="input" value="{{ $user->email }}">
                    <label for="email">Mot de passe</label>
                    <input name="password" type="password" id="password" class="input">
                    <hr class="dark:border-gray-700">
                    <div class="p-3 bg-white dark:bg-gray-800 text-right rounded-b">
                        <button class="btn btn-green" type="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>
@endsection
