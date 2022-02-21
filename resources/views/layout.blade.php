<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Test') }} | @yield('title')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    <div class="wrapper container mt-5">
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
</body>

</html>