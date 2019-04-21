<nav class="navbar is-spaced has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="{{ asset('media/linkube-logo-info-new.png') }}" width="112" height="28">
        </a>

        <a class="navbar-item is-hidden-desktop" href="https://t.me/linkube" target="_blank">
                    <span class="icon has-text-info" style="font-size: 20px;">
                        <i class="fab fa-telegram"></i>
                    </span>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                        <span class="icon nav-icon has-text-info">
                            <i class="fas fa-cube"></i>
                        </span>
                    {{ __('home.products') }}
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item" href="fuckyou">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>

            <a class="navbar-item">
                    <span class="icon nav-icon has-text-success">
                            <i class="far fa-credit-card"></i>
                        </span>
                {{ __('home.pricing') }}
            </a>

            <a class="navbar-item">
                    <span class="icon nav-icon has-text-danger">
                            <i class="fas fa-book"></i>
                        </span>
                {{ __('home.documentation') }}
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                        <span class="icon nav-icon has-text-star">
                            <i class="fas fa-star"></i>
                        </span>
                    {{ __('home.explore') }}
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>
        </div>

        <div class="is-divider is-hidden-desktop navbar-user-divider"></div>

        <div class="navbar-end">
            <a class="navbar-item is-hidden-mobile is-hidden-desktop-only" href="https://t.me/linkube" target="_blank">
                    <span class="icon has-text-info" style="font-size: 25px;">
                        <i class="fab fa-telegram"></i>
                    </span>
            </a>

            @auth
            @else
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-info bd-rainbow" href="{{ route('signup') }}">
                            <strong>{{ __('home.signup') }}</strong>
                        </a>
                        <a class="button is-light" href="{{ route('login') }}">
                            {{ __('home.login') }}
                        </a>
                    </div>
                </div>

            @endauth

            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class="icon nav-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        {{ auth()->user()->name }}
                    </a>

                    <div class="navbar-dropdown">
                        <span class="navbar-item">
                            {{ auth()->user()->email }}
                        </span>

                        <a class="navbar-item" href="{{ route('dashboard') }}">
                            <span class="icon nav-icon">
                                <i class="fas fa-flag"></i>
                            </span>
                            {{ __('home.notifications') }}(0)
                        </a>

                        <a class="navbar-item" href="{{ route('dashboard') }}">
                            <span class="icon nav-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            {{ __('home.dashboard') }}
                        </a>

                        <a class="navbar-item" href="{{ route('dashboard') }}">
                            <span class="icon nav-icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </span>
                            {{ __('home.billing') }}
                        </a>

                        <a class="navbar-item" href="{{ route('dashboard.account') }}">
                            <span class="icon nav-icon">
                                <i class="fas fa-user-cog"></i>
                            </span>
                            {{ __('home.account_config') }}
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" onclick="document.logOutForm.submit();">
                            <span class="icon nav-icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            {{ __('home.logout') }}
                        </a>
                        <form name="logOutForm" method="POST" action="{{ route('logout') }}">@csrf</form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>