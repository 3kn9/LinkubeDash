@extends('layouts.auth')

@section('box')
    @if (session('email'))
        <h3 class="subtitle is-3 has-text-centered">{{ __('auth_page.recovery_link_sent') }}</h3>
        <div class="has-text-centered has-text-info" style="font-size: 48px;">
            <i class="fas fa-check-square"></i>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <p>
                        {!! __('auth_page.recovery_link_sent_description', ['email' => session('email')]) !!}
                    </p>
                </div>
            </div>
        </div>
    @else
        <h3 class="subtitle is-3 has-text-centered">{{ __('auth_page.forgot_password') }}</h3>
        <div class="columns">
            <div class="column">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="field">
                        <p>
                            {!! __('auth_page.reset_password_description') !!}
                        </p>
                    </div>
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
                        <div class="control">
                            <button class="button is-info is-fullwidth" onclick="setLoading(this)">{{ __('auth_page.send_recovery_link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection