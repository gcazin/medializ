@extends('layouts.app')

@section('content')
    <h1 class="text-xl">Votre profil</h1>
    <div class="flex mt-4">
        <div class="w-1/4">
            <div class="bg-white text-center pt-4 shadow">
                <img class="m-auto rounded-full h-32 border border-solid border-gray-300" src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="">
                <h3 class="my-3 text-xl">{{ $user->name }}</h3>
                <ul>
                    <li class="border-solid border border-gray-200"><a class="hover:bg-gray-200 block py-3" href="#">Informations personnelles</a></li>
                    <li class="border-solid border-b border-gray-200"><a class="hover:bg-gray-200 block py-3" href="{{ route('settings') }}">Options</a></li>
                    <li class="border-solid border-b border-gray-200"><a class="hover:bg-gray-200 block py-3" href="#">Avancé</a></li>
                </ul>
            </div>
            <div ></div>
        </div>
        <div class="w-3/4">
            <div class="bg-white shadow ml-5">
                <h1>Test</h1>
            </div>
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
