<nav class="navbar has-shadow is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="{{ asset('media/linkube-logo-white-new.png') }}" width="112" height="28">
        </a>

        <div class="navbar-item">
            仪表盘
        </div>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">


        <div class="is-divider is-hidden-desktop navbar-user-divider"></div>

        <div class="navbar-end">
            <a class="navbar-item is-hoverable">
                <span class="icon nav-icon">
                    <i class="far fa-credit-card"></i>
                </span>
                &#165; {{ sprintf('%.2f', auth()->user()->balance) }}

                <div class="navbar-dropdown">
                    <span class="navbar-item is-size-7">
                        上个计费周期消耗: &#165; 0.00
                        <br/>预计当前计费周期(小时)消耗: &#165; {{ sprintf('%.2f', auth()->user()->balance) }}
                        <br/>24 小时内消耗: &#165; 0.00
                    </span>
                </div>
            </a>

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
        </div>
    </div>
</nav>