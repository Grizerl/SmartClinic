@extends('layouts.doctor')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Список послуг</h2>
</div>
<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Назва послуги</th>
            <th class="p-3">Опис</th>
            <th class="p-3">Ціна</th>
            <th class="p-3">Дата створення</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($favor as $favors)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $favors->name }}</td>
                <td class="p-3">{{ $favors->description }}</td>
                <td class="p-3">{{ $favors->price }} грн</td>
                <td class="p-3">{{ $favors->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
