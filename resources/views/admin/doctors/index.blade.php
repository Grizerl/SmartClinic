@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Лікарі</h2>
    <a href="{{ route('doctors.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Додати</a>
</div>
<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Ім'я</th>
            <th class="p-3">Спеціалізація</th>
            <th class="p-3">Телефон</th>
            <th class="p-3">Email</th>
            <th class="p-3">Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $doctor->name }}</td>
                <td class="p-3">{{ $doctor->specialization }}</td>
                <td class="p-3">{{ $doctor->phone }}</td>
                <td class="p-3">{{ $doctor->email }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-blue-600 hover:underline">Редагувати</a>
                    <form action="{{ route('doctors.destroy',$doctor->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Видалити лікаря?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <div style="margin-top: 15px;">
        {{ $doctors->links() }}   
    </div>
@endsection
