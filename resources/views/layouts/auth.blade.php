@extends('layouts.main')

@section('body_class', 'has-background-info')



@section('content')
    <div class="container has-text-centered logo">
        <a href="/"><img alt="Linkube" width="125" height="40" src="{{ asset('media/linkube_title_white.png') }}"></a>
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
@endsection