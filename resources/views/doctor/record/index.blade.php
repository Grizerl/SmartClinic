@extends('layouts.doctor')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Медичні записи</h2>
    <a href="{{ route('medical_record.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Додати</a>
</div>
<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Ім'я клієнта</th>
            <th class="p-3">Ім'я лікаря</th>
            <th class="p-3">Опис звернення</th>
            <th class="p-3">Дата заявки</th>
            <th class="p-3">Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $record->user->name }}</td>
                <td class="p-3">{{ $record->doctor->name }}</td>
                <td class="p-3">{{ $record->description }}</td>
                <td class="p-3">{{ $record->created_at }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('medical_record.edit', $record->id) }}" class="text-blue-600 hover:underline">Редагувати</a>
                    <form action="{{ route('medical_record.destroy',$record->id) }}" method="post" class="inline">
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
        {{ $records->links() }}   
    </div>
@endsection
