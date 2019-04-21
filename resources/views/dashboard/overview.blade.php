@extends('layouts.dashboard')

@section('content')
    @include('layouts.dashboard-nav')

    <div class="columns is-fullheight">
        <div class="column is-2 is-sidebar-menu is-hidden-mobile">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a>Dashboard</a></li>
                    <li><a>Customers</a></li>
                </ul>
                <p class="menu-label">
                    Administration
                </p>
                <ul class="menu-list">
                    <li><a>Team Settings</a></li>
                    <li>
                        <a class="is-active">Manage Your Team</a>
                        <ul>
                            <li><a>Members</a></li>
                            <li><a>Plugins</a></li>
                            <li><a>Add a member</a></li>
                        </ul>
                    </li>
                    <li><a>Invitations</a></li>
                    <li><a>Cloud Storage Environment Settings</a></li>
                    <li><a>Authentication</a></li>
                </ul>
                <p class="menu-label">
                    Transactions
                </p>
                <ul class="menu-list">
                    <li><a>Payments</a></li>
                    <li><a>Transfers</a></li>
                    <li><a>Balance</a></li>
                </ul>
            </aside>
        </div>
        <div class="column is-main-content">
            <section class="hero is-info welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            嗨，{{ auth()->user()->name。 }}
                        </h1>
                        <h2 class="subtitle">
                            您想要做点什么？
                        </h2>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection