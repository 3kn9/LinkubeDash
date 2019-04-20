@extends('layouts.auth')

@if(session('logged_out'))
@section('notification')
    <div class="notification is-primary">
        <button class="delete"></button>
        {{ __('auth_page.logged_out') }}
    </div>
@endsection
@endif

@section('box')
    <h3 class="subtitle is-3 has-text-centered">{{ __('auth_page.login') }}</h3>
    <div class="columns">
        <div class="column">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label class="label">{{ __('auth_page.email_address') }}</label>
                    <div class="control has-icons-left">
                        <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="{{ __('auth_page.example_email') }}" >
                        <span class="icon is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>


                <div class="field">
                    <label class="label">{{ __('auth_page.password') }}</label>
                    <div class="control has-icons-left">
                        <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" type="password">
                        <span class="icon is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <div class="columns">
                        <div class="column">
                            <a class="has-text-left" href="/password/reset">{{ __('auth_page.forgot_password') }}</a>
                        </div>
                        <div class="column">
                            <div class="has-text-right">
                                <input class="is-checkradio is-info is-rtl" id="remember" type="checkbox" name="remember">
                                <label for="remember">{{ __('auth_page.remember_me') }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-info is-fullwidth">{{ __('auth_page.login') }}</button>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <a href="{{ route('github') }}" class="button is-gray-light is-fullwidth">
                        <span class="icon">
                            <i class="fab fa-github"></i>
                        </span>
                            <span>{{ __('auth_page.login_with_github') }}</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('switch')
    {{ __('auth_page.new_here') }}<a class="auth-switch-link" href="{{ route('signup') }}">{{ __('auth_page.click_to_sign_up') }}</a>
@endsection