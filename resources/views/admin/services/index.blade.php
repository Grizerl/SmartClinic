@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Послуги</h2>
    <a href="{{ route('services.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Додати</a>
</div>
<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Назва</th>
            <th class="p-3">Опис</th>
            <th class="p-3">Ціна</th>
            <th class="p-3">Дата створення</th>
            <th class="p-3">Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $servic)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $servic->name }}</td>
                <td class="p-3">{{ $servic->description }}</td>
                <td class="p-3">{{ $servic->price }} грн</td>
                <td class="p-3">{{ $servic->created_at }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('services.edit', $servic->id) }}" class="text-blue-600 hover:underline">Редагувати</a>
                    <form action="{{ route('services.destroy',$servic->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Видалити послугу?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <div style="margin-top: 15px;">
        {{ $services->links() }}   
    </div>
@endsection
