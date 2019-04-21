@extends('layouts.main')

@section('head')
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('body_class', 'has-background-info')

@section('content')
    <div class="container has-text-centered logo">
        <a href="/"><img alt="Linkube" width="125" height="40" src="{{ asset('media/linkube-logo-white-new.png') }}"></a>
    </div>
    <div class="columns">
        <div class="column container is-3-desktop is-5-tablet is-11-mobile">
            @yield('notification')
            <div class="box has-shadow box-shadow">
            @yield('box')
            </div>
        </div>
    </div>
    <div class="has-text-centered has-text-white">
    @yield('switch')
    </div>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection