<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Мій кабінет' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-600 text-white p-4 shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">MyClinic</h1>
            <nav class="space-x-4 flex">
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button type="submit" class="underline bg-transparent border-none cursor-pointer p-0 m-0">
                        Вийти
                    </button>
                </form>
                @can('view', auth()->user())
                    <a class="underline bg-transparent border-none cursor-pointer p-0 m-0" href="{{ route('dashboard.admin') }}">Адмінка</a>
                @endcan
            </nav>
        </div>
    </header>
    <main class="max-w-6xl mx-auto p-6 mt-4 bg-white rounded shadow">
        @yield('content')
    </main>
</body>
</html>
