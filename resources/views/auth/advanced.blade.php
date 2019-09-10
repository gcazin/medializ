@extends('partials.account-content')

@section('account-content')
    <div class="py-3 px-4 bg-white dark:bg-gray-700 rounded-t">Accéder à des options destinées aux développeurs.</div>
    <div class="bg-gray-100 dark:bg-gray-800 py-2 px-4 rounded-b">
        <p>Vous pouvez accéder à l'api en utilisant l'adresse suivante, <a class="link" href="{{ url('/api') }}">{{ url('/api') }}</a></p>
    </div>
@endsection
