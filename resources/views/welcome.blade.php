@extends('layouts.main')

@section('content')
    @include('layouts.navbar')

    <section class="hero is-info is-large">
        <div class="hero-body columns is-8 is-offset-2">
            <div class="column container">
                <h1 class="title">
                    {{ __('home.home_title_1') }}
                </h1>
                <h2 class="subtitle">
                    {{ __('home.home_title_2') }}
                </h2>
            </div>

            <div class="column container">
                <a class="bd-focus-item column has-text-centered" href="https://bulma.io/documentation/overview/modular">
                    <figure class="bd-focus-cubes bd-focus-icon">
                    <span class="bd-focus-cube bd-focus-cube-1 icon is-large">
                        <i class="fas fa-2x fa-cube"></i>
                    </span>
                        <span class="bd-focus-cube bd-focus-cube-2 icon is-large">
                        <i class="fas fa-2x fa-cube"></i>
                    </span>
                        <span class="bd-focus-cube bd-focus-cube-3 icon is-large">
                        <i class="fas fa-2x fa-cube"></i>
                    </span>
                    </figure>
                </a>
            </div>

        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                © 2019 Linkube Limited. All rights reserved.
            </p>
        </div>
    </footer>

@endsection
