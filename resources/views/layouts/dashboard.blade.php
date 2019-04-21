@extends('layouts.main')

@section('content')
    @yield('content');
@endsection

@section('script')
    <script src="{{ asset('js/bulma-quickview.min.js') }}"></script>
    <script>
        var quickviews = bulmaQuickview.attach(); // quickviews now contains an array of all Quickview instances
    </script>
@endsection