<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyClinic')</title>
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    <main>
        @yield('content')
    </main>
</body>
</html>
