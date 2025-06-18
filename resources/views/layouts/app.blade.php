<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MyClinic')</title>
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="d-flex justify-between items-center">
            <h1>MyClinic</h1>
            @if (!in_array(Route::currentRouteName(), ['personnel.show', 'personnel.store']))
                @include('partials.header')
            @endif
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
