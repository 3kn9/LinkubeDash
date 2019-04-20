@extends('layouts.auth')

@section('box')
    <h3 class="subtitle is-3 has-text-centered">{{ __('auth_page.sign_up') }}</h3>
    <div class="columns">
        <div class="column">
            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="field">
                    <label class="label">{{ __('auth_page.name') }}</label>
                    <div class="control has-icons-left">
                        <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="{{ __('auth_page.your_name') }}">
                        <span class="icon is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    </div>
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">{{ __('auth_page.email_address') }}</label>
                    <div class="control has-icons-left">
                        <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="{{ __('auth_page.example_email') }}">
                        <span class="icon is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
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
                    <input id="subscribe" type="checkbox" name="subscribe" class="switch is-rounded is-outlined is-info" checked="checked">
                    <label for="subscribe"></label>{{ __('auth_page.subscribe_to_us') }}
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-info is-fullwidth">{{ __('auth_page.sign_up') }}</button>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <a href="{{ route('github') }}" class="button is-gray-light is-fullwidth">
                        <span class="icon">
                            <i class="fab fa-github"></i>
                        </span>
                            <span>{{ __('auth_page.sign_up_with_github') }}</span>
                        </a>
                    </div>
                </div>

                <div class="field">
                    <span>{!! __('auth_page.agree_terms') !!}</span>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('switch')
    {{ __('auth_page.already_a_member') }}&nbsp;<a class="auth-switch-link" href="{{ route('login') }}">{{ __('auth_page.click_to_log_in') }}</a>
@endsection