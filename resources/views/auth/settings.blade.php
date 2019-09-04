@extends('layouts.base')

@section('content')
    <div class="w-9/12 m-auto">
        <h1 class="text-xl">Options</h1>
        @include('auth.partials.account-nav')
        <div class="shadow">
            <div class="p-3 bg-white dark:bg-gray-700 rounded-t">{{ __("Modifier vos préférences, et aidez-nous à personnaliser votre expérience.") }}</div>
            <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-b">
                <label class="custom-label flex justify-between">
                    <span class="select-none w-11/12"> Changer le thème</span>
                    <div class="text-right">
                        <div class="bg-white dark:bg-gray-900 shadow w-6 h-6 p-1 flex border-blue-200 dark:border-black border-solid border">
                            <input type="checkbox" class="hidden" name="remember" id="themeSwitch" {{ old('remember') ? 'checked' : '' }}>
                            <svg class="hidden w-4 h-4 text-blue-500 pointer-events-none" viewBox="0 0 172 172"><g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/></g></svg>
                        </div>
                    </div>
                </label>
            </div>
            <!--<hr class="dark:border-gray-700">
            <div class="p-3 bg-white dark:bg-gray-800 text-right rounded-b">
                <button class="btn btn-blue">Sauvegarder</button>
            </div>-->
        </div>
    </div>

    <!--<div class="container">
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
        <div class="row justify-content-center">

            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                    <div class="rank-label-container">
                        <span class="label label-default rank-label">{{$user->name}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
        <div class="form-group">
            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>-->
@endsection
