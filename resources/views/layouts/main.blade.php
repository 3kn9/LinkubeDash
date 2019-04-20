<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Linkube')</title>

@yield('head')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="@yield('body_class')">

@yield('content')

<script src="{{ mix('js/random.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
@if(config('services.recaptcha.enable'))

<script src="https://www.recaptcha.net/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: '@yield('action', 'default')'}).then(function(token) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/captcha', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({
                'token': token
            }));
        });
    });
</script>

@endif
</body>
</html>