<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Control Center')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Control Panel</h1>
        <nav class="space-x-4">
            <a href="{{ route('dashboard.admin') }}" class="text-blue-600 hover:underline">Головна</a>
            <a href="{{ route('doctors.index') }}" class="text-blue-600 hover:underline">Лікарі</a>
            <a href="{{ route('services.index') }}" class="text-blue-600 hover:underline">Послуги</a>
            <a href="{{ route('appoinment.page') }}" class="text-blue-600 hover:underline">Прийоми</a>
            <form method="post" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:underline">Вийти</button>
            </form>
        </nav>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
