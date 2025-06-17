@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Записи</h2>
</div>

<div class="mb-4">
    <form method="GET" class="flex items-center space-x-2">
        <label for="doctor_id" class="text-sm font-medium">Фільтр по лікарю:</label>
        <select name="doctor_id" id="doctor_id" class="border border-gray-300 rounded p-2">
            <option value="">Усі лікарі</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                    {{ $doctor->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Фільтрувати</button>
    </form>
</div>

<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Ім'я клієнта</th>
            <th class="p-3">Ім'я лікаря</th>
            <th class="p-3">Послуга</th>
            <th class="p-3">Виконання</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receptions as $reception)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $reception->user->name }}</td>
                <td class="p-3">{{ $reception->doctor->name }}</td>
                <td class="p-3">{{ $reception->service->name }}</td>
                <td class="p-3">{{ $reception->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $receptions->appends(request()->query())->links() }}
</div>
@endsection
